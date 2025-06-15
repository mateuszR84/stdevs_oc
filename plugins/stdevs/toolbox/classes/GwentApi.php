<?php
namespace Stdevs\Toolbox\Classes;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Client\Response;
use Exception;

class GwentApi
{
    private string $apiUrl;
    private string $cacheKey = 'gwent_cards_with_flavor';
    
    public function __construct()
    {
        $this->apiUrl = env('GWENT_API_URL');
        
        if (!$this->apiUrl) {
            throw new Exception('Api URL not configured in environment');
        }
    }
    
    public function getRandomFlavor(): ?array
    {
        try {
            $cardsWithFlavor = Cache::get($this->cacheKey);
            
            if (!$cardsWithFlavor) {
                $cardsWithFlavor = $this->fetchAndCacheCards();
                
                if (!$cardsWithFlavor) {
                    return null;
                }
            }
            
            if (empty($cardsWithFlavor)) {
                return null;
            }
            
            return $cardsWithFlavor[array_rand($cardsWithFlavor)];
            
        } catch (Exception $e) {
            \Log::error('GwentApi error: ' . $e->getMessage());
            return null;
        }
    }
    
    public function getAllCards(): ?array
    {
        try {
            $endpoint = '/?key=data&version=13.6.0';
            $url = $this->apiUrl . $endpoint;
            
            $response = Http::timeout(30)->get($url);
            
            if (!$response->successful()) {
                throw new Exception("API request failed with status: " . $response->status());
            }
            
            return $response->json();
            
        } catch (Exception $e) {
            \Log::error('GwentApi error: ' . $e->getMessage());
            return null;
        }
    }
    
    public function getCardsByFaction(string $faction): array
    {
        $allData = $this->getAllCards();
        
        if (!$allData) {
            return [];
        }
        
        $cards = [];
        
        foreach ($allData as $category => $items) {
            if (is_array($items)) {
                foreach ($items as $item) {
                    if (isset($item['faction']) && 
                        strtolower($item['faction']) === strtolower($faction)) {
                        $cards[] = $item;
                    }
                }
            }
        }
        
        return $cards;
    }
    
    private function extractCardsWithFlavor(array $data): array
    {
        $cardsWithFlavor = [];
        
        foreach ($data as $category => $items) {
            if (is_array($items)) {
                foreach ($items as $item) {
                    if (isset($item['flavor']) && !empty($item['flavor'])) {
                        $card = [
                            'name' => $item['name'] ?? 'Unknown',
                            'flavor' => $item['flavor'],
                            'faction' => $item['faction'] ?? null,
                            'rarity' => $item['rarity'] ?? null,
                            'category' => $category
                        ];
                        
                        $cardsWithFlavor[] = $card;
                    }
                }
            }
        }
        
        return $cardsWithFlavor;
    }
    
    private function fetchAndCacheCards(): ?array
    {
        try {
            $endpoint = '/?key=data&version=13.6.0';
            $url = $this->apiUrl . $endpoint;
            
            $response = Http::timeout(30)->get($url);
            
            if (!$response->successful()) {
                throw new Exception("API request failed with status: " . $response->status());
            }
            
            $data = $response->json();
            
            if (!$data) {
                throw new Exception('Invalid JSON response from API');
            }
            
            $cardsWithFlavor = $this->extractCardsWithFlavor($data);
            
            if (!empty($cardsWithFlavor)) {
                Cache::forever($this->cacheKey, $cardsWithFlavor);
            }
            
            return $cardsWithFlavor;
            
        } catch (Exception $e) {
            \Log::error('GwentApi fetchAndCacheCards error: ' . $e->getMessage());
            return null;
        }
    }
    
    public function refreshCache(): bool
    {
        try {
            Cache::forget($this->cacheKey);
            
            $cardsWithFlavor = $this->fetchAndCacheCards();
            
            return !empty($cardsWithFlavor);
            
        } catch (Exception $e) {
            \Log::error('GwentApi refreshCache error: ' . $e->getMessage());
            return false;
        }
    }
    
    public function getCacheInfo(): array
    {
        $hasCache = Cache::has($this->cacheKey);
        $cacheData = Cache::get($this->cacheKey);
        
        return [
            'has_cache' => $hasCache,
            'cache_size' => $hasCache ? count($cacheData) : 0,
            'cache_key' => $this->cacheKey
        ];
    }
    
    public function searchCardsByName(string $name): array
    {
        $allData = $this->getAllCards();
        
        if (!$allData) {
            return [];
        }
        
        $foundCards = [];
        $searchTerm = strtolower($name);
        
        foreach ($allData as $category => $items) {
            if (is_array($items)) {
                foreach ($items as $item) {
                    if (isset($item['name']) && 
                        str_contains(strtolower($item['name']), $searchTerm)) {
                        $foundCards[] = $item;
                    }
                }
            }
        }
        
        return $foundCards;
    }
    
    public function getApiStatus(): array
    {
        try {
            $startTime = microtime(true);
            $response = Http::timeout(10)->get($this->apiUrl);
            $responseTime = round((microtime(true) - $startTime) * 1000, 2);
            
            return [
                'status' => $response->successful() ? 'online' : 'offline',
                'response_time_ms' => $responseTime,
                'status_code' => $response->status()
            ];
            
        } catch (Exception $e) {
            return [
                'status' => 'offline',
                'error' => $e->getMessage()
            ];
        }
    }
}