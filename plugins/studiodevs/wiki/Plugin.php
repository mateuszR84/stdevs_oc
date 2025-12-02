<?php

namespace StudioDevs\Wiki;

use Backend;
use System\Classes\PluginBase;
use StudioDevs\Wiki\Components\ArticlesList;
use StudioDevs\Wiki\Components\ArticleDetails;

/**
 * Plugin Information File
 *
 * @link https://docs.octobercms.com/4.x/extend/system/plugins.html
 */
class Plugin extends PluginBase
{
    /**
     * pluginDetails about this plugin.
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Wiki',
            'description' => 'No description provided yet...',
            'author' => 'StudioDevs',
            'icon' => 'icon-leaf'
        ];
    }

    /**
     * register method, called when the plugin is first registered.
     */
    public function register()
    {
        //
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
            ArticleDetails::class => 'articleDetails',
            ArticlesList::class => 'articlesList',
        ];
    }

    /**
     * registerPermissions used by the backend.
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'studiodevs.wiki.some_permission' => [
                'tab' => 'Wiki',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * registerNavigation used by the backend.
     */
    public function registerNavigation()
    {
        return [
            'wiki' => [
                'label' => 'Wiki',
                'url' => Backend::url('studiodevs/wiki/articles'),
                'icon' => 'icon-magic-wand',
                'permissions' => ['studiodevs.wiki.*'],
                'order' => 500,

                'sideMenu' => [
                    'new_article' => [
                        'label' => 'studiodevs.wiki::lang.navigation.new_article',
                        'icon' => 'icon-list-add',
                        'url' => Backend::url('studiodevs/wiki/articles/create'),
                    ],

                    'articles' => [
                        'label' => 'studiodevs.wiki::lang.navigation.articles',
                        'icon' => 'icon-list',
                        'url' => Backend::url('studiodevs/wiki/articles'),
                    ],

                    'categories' => [
                        'label' => 'studiodevs.wiki::lang.navigation.categories',
                        'icon' => 'icon-filter',
                        'url' => Backend::url('studiodevs/wiki/categories'),
                    ],
                ]
            ],
        ];
    }
}
