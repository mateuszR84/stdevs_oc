<?php

namespace StudioDevs\Wiki\Components;

use Cms\Classes\ComponentBase;
use StudioDevs\Wiki\Models\Tag;

/**
 * TagArticlesList Component
 *
 * @link https://docs.octobercms.com/4.x/extend/cms-components.html
 */
class TagArticlesList extends ComponentBase
{
    public $tag;
    public $articles;

    public function componentDetails()
    {
        return [
            'name' => 'Tag Articles List',
            'description' => 'Wyświetla artykuły powiązane z wybranym tagiem'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title' => 'Slug Tagu',
                'default' => '{{ :slug }}',
                'type' => 'string'
            ]
        ];
    }

    public function onRun()
    {
        $slug = $this->property('slug');

        $this->tag = Tag::where('slug', $slug)->with('articles.category')->first();

        if ($this->tag) {
            $this->articles = $this->tag->articles;
        }
    }
}
