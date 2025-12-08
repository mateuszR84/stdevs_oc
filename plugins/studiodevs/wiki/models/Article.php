<?php

namespace StudioDevs\Wiki\Models;

use Model;
use StudioDevs\Wiki\Models\Tag;

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

    public $belongsTo = [
        'category' => [
            Category::class,
        ]
    ];

    public $belongsToMany = [
        'tags' => [
            Tag::class,
            'table' => 'studiodevs_wiki_article_tag',
            'key' => 'article_id',
            'otherKey' => 'tag_id'
        ]
    ];

    public function beforeSave()
    {
        trace_log(post());    
    }
    public function afterSave()
    {
        trace_log($this->tags);    
    }
}
