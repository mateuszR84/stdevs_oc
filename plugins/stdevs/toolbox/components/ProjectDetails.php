<?php

namespace Stdevs\Toolbox\Components;

use Cms\Classes\ComponentBase;
use Stdevs\Toolbox\Models\Project;

/*
 * ProjectDetails Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ProjectDetails extends ComponentBase
{
    public $project;
    public function componentDetails()
    {
        return [
            'name' => 'Project Details Component',
            'description' => 'No description provided yet...'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'stdevs.toolbox::lang.components.project_details.properties.slug_title',
                'description' => 'stdevs.toolbox::lang.components.project_details.properties.slug_description',
                'default'     => '{{ :slug }}',
                'type'        => 'string',
            ],
        ];
    }

    public function onRun()
    {
        $this->project = Project::where('slug', $this->property('slug'))->first();    
    }
}
