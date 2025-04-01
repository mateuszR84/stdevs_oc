<?php namespace Stdevs\Toolbox\Components;

use Cms\Classes\ComponentBase;

/**
 * ProjectDetails Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ProjectDetails extends ComponentBase
{
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
        return [];
    }
}
