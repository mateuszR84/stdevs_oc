<?php

namespace StudioDevs\Wiki\Components;

use Cms\Classes\ComponentBase;
use StudioDevs\Wiki\Models\Article;

/**
 * ArticleDetails Component
 *
 * @link https://docs.octobercms.com/4.x/extend/cms-components.html
 */
class ArticleDetails extends ComponentBase
{
    public $article;
    
    public function componentDetails()
    {
        return [
            'name' => 'Article Details Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @link https://docs.octobercms.com/4.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [
            'slug' => [
                'title' => 'studiodevs.wiki::lang.components.article_details.slug',
                'description' => 'studiodevs.wiki::lang.components.article_details.slug_description',
                'default' => '{{ :slug }}'
            ]
        ];
    }

    public function onRun()
    {
        $this->article = Article::with('category')->where('slug', $this->property('slug'))->first();
    }
}
