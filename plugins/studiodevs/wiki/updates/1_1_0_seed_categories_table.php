<?php

namespace StudioDevs\Wiki\Updates;

use Db;
use Seeder;
use Illuminate\Support\Str;

/**
 * CreateCategoriesTable Migration
 *
 * @link https://docs.octobercms.com/4.x/extend/database/structure.html
 */
class SeedCategories extends Seeder
{
    /**
     * up builds the migration
     */
    public function run()
    {
        $categories = [
            'Wprowadzenie',
            'Instalacja',
            'Konfiguracja',
            'Funkcjonalności',
            'FAQ'
        ];

        foreach ($categories as $title) {
            Db::table('studiodevs_wiki_categories')->insert([
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
};
