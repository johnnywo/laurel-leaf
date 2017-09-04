<?php namespace Milo\Sportstv;

use Backend;
use System\Classes\PluginBase;

/**
 * Sportstv Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Sportstv',
            'description' => 'No description provided yet...',
            'author'      => 'Milo',
            'icon'        => 'icon-futbol-o'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Milo\Sportstv\Components\Games' => 'games',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'milo.sportstv.some_permission' => [
                'tab' => 'Sportstv',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'sportstv' => [
                'label'       => 'Sports TV',
                'url'         => Backend::url('milo/sportstv/games'),
                'icon'        => 'icon-futbol-o',
                'permissions' => ['milo.sportstv.*'],
                'order'       => 525,

                'sideMenu' => [

	                'sportstv' => [
		                'label'       => 'Games',
		                'url'         => Backend::url('milo/sportstv/games'),
		                'icon'        => 'icon-futbol-o',
		                'permissions' => ['milo.sportstv.*'],
	                ],

	                'teams' => [
		                'label'       => 'Teams',
		                'url'         => Backend::url('milo/sportstv/teams'),
		                'icon'        => 'icon-male',
		                'permissions' => ['milo.sportstv.*'],
	                ],

	                'leagues' => [
	                    'label'       => 'League',
	                    'url'         => Backend::url('milo/sportstv/leagues'),
	                    'icon'        => 'icon-tag',
	                    'permissions' => ['milo.sportstv.*'],
                    ]
                ]
            ],
        ];
    }
}
