<?php namespace Stdevs\Toolbox\Components;

use Cms\Classes\ComponentBase;

/**
 * ProjectsList Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class ProjectsList extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Projects List Component',
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
