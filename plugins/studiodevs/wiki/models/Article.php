<?php

namespace StudioDevs\Wiki\Models;

use Model;

/**
 * Article Model
 *
 * @link https://docs.octobercms.com/4.x/extend/system/models.html
 */
class Article extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string table name
     */
    public $table = 'studiodevs_wiki_articles';

    protected $slugs = [
        'slug' => 'title',
    ];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'title' => 'required',
    ];

    public $belongsToMany = [
        'categories' => [
            Category::class,
            'table' => 'studiodevs_wiki_articles_categories',
            'order' => 'title'
        ]
    ];
}
