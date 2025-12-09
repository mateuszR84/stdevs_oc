<?php

namespace StudioDevs\Wiki\Models;

use Model;
use StudioDevs\Wiki\Models\Article;

/**
 * Tag Model
 *
 * @link https://docs.octobercms.com/4.x/extend/system/models.html
 */
class Tag extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\Sluggable;

    /**
     * @var string table name
     */
    public $table = 'studiodevs_wiki_tags';

    protected $slugs = [
        'slug' => 'name',
    ];

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required|string|min:2|max:20',
        'color' => 'required'
    ];

    public $belongsToMany = [
        'articles' => [
            Article::class,
            'table' => 'studiodevs_wiki_article_tag',
            'key' => 'tag_id',
            'otherKey' => 'article_id'
        ]
    ];
}
