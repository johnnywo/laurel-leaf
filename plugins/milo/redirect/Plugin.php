<?php namespace Milo\Redirect;

use Backend;
use System\Classes\PluginBase;
use Route;
use Redirect;

/**
 * Redirect Plugin Information File
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
            'name'        => 'Redirect',
            'description' => 'set 301 redirects (SEO)',
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
        Route::get('/contact', function() {
            return Redirect::to('/contact-reservation', 301); 
        });

        Route::get('/content/billard-darts', function() {
            return Redirect::to('/#billard-darts', 301); 
        });

        Route::get('/node/14', function() {
            return Redirect::to('/food-drinks#drinks', 301); 
        });

        Route::get('/photos', function() {
            return Redirect::to('/photo-gallery', 301); 
        });

       Route::get('/food', function() {
           return Redirect::to('/food-drinks', 301); 
       }); 

       Route::get('/reservierung', function() {
           return Redirect::to('/contact-reservation#reservation', 301); 
       });
       
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
            'Milo\Redirect\Components\MyComponent' => 'myComponent',
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
            'milo.redirect.some_permission' => [
                'tab' => 'Redirect',
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
        return []; // Remove this line to activate

        return [
            'redirect' => [
                'label'       => 'Redirect',
                'url'         => Backend::url('milo/redirect/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['milo.redirect.*'],
                'order'       => 500,
            ],
        ];
    }
}
