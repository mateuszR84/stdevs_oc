<?php

namespace StudioDevs\Wiki\Components;

use Cms\Classes\ComponentBase;
use StudioDevs\Wiki\Models\Article;
use StudioDevs\Wiki\Models\Category;

/**
 * ArticlesList Component
 *
 * @link https://docs.octobercms.com/4.x/extend/cms-components.html
 */
class ArticlesList extends ComponentBase
{
    public $articles;
    public $categories;

    public function componentDetails()
    {
        return [
            'name' => 'Articles List Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @link https://docs.octobercms.com/4.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->categories = Category::with('articles')->whereHas('articles')->get();
    }
}
