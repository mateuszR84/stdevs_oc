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

    /**
     * @var string table name
     */
    public $table = 'studiodevs_wiki_tags';

    /**
     * @var array rules for validation
     */
    public $rules = [];

    public $belongsToMany = [
        'articles' => [
            Article::class,
            'tags' => 'studiodevs_wiki_article_tag',
            'key' => 'tag_id',
            'otherKey' => 'article_id'
        ]
    ];
}
