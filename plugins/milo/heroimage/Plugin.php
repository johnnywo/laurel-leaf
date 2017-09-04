<?php namespace Milo\HeroImage;

use Backend;
use System\Classes\PluginBase;

/**
 * HeroImage Plugin Information File
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
            'name'        => 'HeroImage',
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
        return []; // Remove this line to activate

        return [
            'Milo\HeroImage\Components\MyComponent' => 'myComponent',
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
            'milo.heroimage.some_permission' => [
                'tab' => 'HeroImage',
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
            'heroimage' => [
                'label'       => 'Hero Image',
                'url'         => Backend::url('milo/heroimage/heroimages'),
                'icon'        => 'icon-leaf',
                'permissions' => ['milo.heroimage.*'],
                'order'       => 500,
            ],
        ];
    }
}
