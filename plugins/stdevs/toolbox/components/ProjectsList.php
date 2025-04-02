<?php namespace Stdevs\Toolbox\Components;

use Cms\Classes\ComponentBase;
use Stdevs\Toolbox\Models\Project;

/**
 * ProjectsList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ProjectsList extends ComponentBase
{
    public $projects;

    public function componentDetails()
    {
        return [
            'name' => 'Projects List',
            'description' => 'Display projects'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->projects = Project::get();    
    }
}
