<?php namespace Milo\Food;

use Backend;
use System\Classes\PluginBase;

/**
 * Food Plugin Information File
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
            'name'        => 'Food',
            'description' => 'create a Food Menu with ease.',
            'author'      => 'Milo',
            'icon'        => 'icon-cutlery'
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
            'Milo\Food\Components\Foods' => 'foods',
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
            'milo.food.some_permission' => [
                'tab' => 'Food',
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
            'food' => [
                'label'       => 'Food',
                'url'         => Backend::url('milo/food/foods'),
                'icon'        => 'icon-cutlery',
                'permissions' => ['milo.food.*'],
                'order'       => 400,

	            'sideMenu' => [
                    'food' => [
                        'label'       => 'Food',
                        'url'         => Backend::url('milo/food/foods'),
                        'icon'        => 'icon-cutlery',
                        'permissions' => ['milo.food.*'],
                    ],
	            	'categories' => [
			            'label'       => 'Food Categories',
			            'url'         => Backend::url('milo/food/foodcategories'),
			            'icon'        => 'icon-tags',
			            'permissions' => ['milo.food.*'],
		            ]
	            ]
            ],
        ];
    }
}
