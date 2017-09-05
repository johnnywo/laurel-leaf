<?php namespace Milo\Drinks;

use Backend;
use System\Classes\PluginBase;

/**
 * Drinks Plugin Information File
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
            'name'        => 'Drinks',
            'description' => 'No description provided yet...',
            'author'      => 'Milo',
            'icon'        => 'icon-leaf'
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
            'Milo\Drinks\Components\Drinks' => 'drinks',
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
            'milo.drinks.some_permission' => [
                'tab' => 'Drinks',
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
            'drinks' => [
                'label'       => 'Drinks',
                'url'         => Backend::url('milo/drinks/drinks'),
                'icon'        => 'icon-coffee',
                'permissions' => ['milo.drinks.*'],
                'order'       => 500,

                'sideMenu' => [
                    'drinks' => [
                        'label'       => 'Drinks',
                        'url'         => Backend::url('milo/drinks/drinks'),
                        'icon'        => 'icon-coffee',
                        'permissions' => ['milo.drinks.*'],
                    ],
	                'categories' => [
		                'label'       => 'Drink Categories',
		                'url'         => Backend::url('milo/drinks/drinkcategories'),
		                'icon'        => 'icon-tags',
		                'permissions' => ['milo.drinks.*'],
	                ]
                ]
            ],
        ];
    }
}
