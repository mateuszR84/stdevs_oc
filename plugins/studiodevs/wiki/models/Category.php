<?php

namespace StudioDevs\Wiki\Models;

use Model;

/**
 * Category Model
 *
 * @link https://docs.octobercms.com/4.x/extend/system/models.html
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    protected $slugs = [
        'slug' => 'title',
    ];

    /**
     * @var string table name
     */
    public $table = 'studiodevs_wiki_categories';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'title' => 'required',
    ];

    public $belongsToMany = [
        'articles' => [
            'Studiodevs\Wiki\Models\Article',
            'table' => 'studiodevs_wiki_articles_categories',
            'order' => 'published_at desc',
        ],
        'articles_count' => [
            'Studiodevs\Wiki\Models\Articles',
            'table' => 'studiodevs_wiki_articles_categories',
            'count' => true
        ]
    ];
}
