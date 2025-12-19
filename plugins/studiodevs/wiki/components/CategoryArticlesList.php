<?php

namespace StudioDevs\Wiki\Components;

use Cms\Classes\ComponentBase;
use StudioDevs\Wiki\Models\Category;

/**
 * CategoryArticlesList Component
 *
 * @link https://docs.octobercms.com/4.x/extend/cms-components.html
 */
class CategoryArticlesList extends ComponentBase
{
    public $category;
    public $articles;

    public function componentDetails()
    {
        return [
            'name' => 'Category Articles List',
            'description' => 'Wyświetla artykuły powiązane z wybraną kategorią'
        ];
    }

    public function defineProperties()
    {
        return [
            'categorySlug' => [
                'title' => 'studiodevs.wiki::lang.components.category_articles_list.properties.category_slug',
                'default' => '{{ :slug }}',
                'type' => 'string'
            ]
        ];
    }

    public function onRun()
    {
        $slug = $this->property('categorySlug');

        $this->category = Category::where('slug', $slug)->with('articles.tags')->first();

        if ($this->category) {
            $this->articles = $this->category->articles;
        }
    }
}
