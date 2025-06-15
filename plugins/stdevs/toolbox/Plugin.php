<?php

namespace Stdevs\Toolbox;

use Backend;
use System\Classes\PluginBase;
use StDevs\Toolbox\Console\SendGwentReminder;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/3.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Toolbox',
            'description' => 'No description provided yet...',
            'author' => 'Stdevs',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        $this->registerConsoleCommand('toolbox:gwent', SendGwentReminder::class);
    }

    public function registerSchedule($schedule)
    {
        // Wysyłaj email codziennie o 8:00 rano
        $schedule->command('toolbox:gwent')
                 ->dailyAt('08:00')
                 ->timezone('Europe/Warsaw'); // Ustaw swoją strefę czasową
        // Alternatywnie możesz użyć innych opcji czasowych:
        // ->daily() - codziennie o północy
        // ->weekdays() - tylko w dni robocze
        // ->mondays() - tylko w poniedziałki
        // ->cron('0 8 * * *') - własny cron expression
    }
    /**
     * boot method, called right before the request route.
     */
    public function boot()
    {
        //
    }

    /**
     * registerComponents used by the frontend.
     */
    public function registerComponents()
    {
        return [
            'Stdevs\Toolbox\Components\ProjectsList' => 'projectsList',
            'Stdevs\Toolbox\Components\ProjectDetails' => 'projectDetails',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'stdevs.toolbox.some_permission' => [
                'tab' => 'Toolbox',
                'label' => 'Some permission'
            ],
        ];
    }
}
