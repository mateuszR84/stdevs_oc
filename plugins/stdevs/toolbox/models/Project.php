<?php

namespace Stdevs\Toolbox\Models;

use Lang;
use Model;
use System\Models\File;

/**
 * Project Model
 *
 * @link https://docs.octobercms.com/3.x/extend/system/models.html
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string table name
     */
    public $table = 'stdevs_toolbox_projects';

    /**
     * @var array rules for validation
     */
    public $rules = [];
    
    public $jsonable = [
        'technologies'
    ];

    public $attachOne = [
        'preview_image' => File::class
    ];

    public $attachMany = [
        'screenshots' => File::class
    ];

    public function getStatusOptions()
    {
        return [
            'draft' => Lang::get('stdevs.toolbox::lang.models.project.status_draft'),
            'published' => Lang::get('stdevs.toolbox::lang.models.project.status_published'),
            'archived' => Lang::get('stdevs.toolbox::lang.models.project.status_archived'),
        ];
    }

    public function beforeSave()
    {
        if ($this->url) {
            $this->url = 'https://' . $this->url;
        }
    }

    public function getTechLogo($techName)
    {
        $logos = [
            'october' => 'oc.svg',
            'laravel' => 'laravel.svg',
            'Bootstrap5' => 'bootstrap.svg',
            'CSS' => 'css.svg',
            'HTML' => 'html.svg',
            'Vue' => 'vue.svg',
            'JS' => 'js.svg',
        ];

        return $logos[$techName] ?? '';
    }

    public function getMainTechOptions(): array {
        return [
            'october' => 'October CMS',
            'laravel' => 'Laravel',
        ];
    }
}
