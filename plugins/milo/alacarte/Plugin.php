<?php namespace Milo\Alacarte;

use Backend;
use System\Classes\PluginBase;
use Milo\Alacarte\Models\Menu;

/**
 * Alacarte Plugin Information File
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
            'name'        => 'Alacarte',
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
            'Milo\Alacarte\Components\Menu' => 'menu',
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
            'milo.alacarte.some_permission' => [
                'tab' => 'Alacarte',
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
            'alacarte' => [
                'label'       => 'Alacarte',
                'url'         => Backend::url('milo/alacarte/menus'),
                'icon'        => 'icon-leaf',
                'permissions' => ['milo.alacarte.*'],
                'order'       => 500,
            ],
        ];
    }

    public function registerSchedule($schedule)
    {
        $schedule->call(function () {
            $past_alacarte = Menu::where('published', true)
                ->where('publish_date', '<', \Carbon\Carbon::now() )
                ->orWhere('publish_date', NULL)
                ->get();
            $new_alacarte = Menu::where('published', true)
                ->where('publish_date', \Carbon\Carbon::now() )
                ->get();
            if ( $new_alacarte->isNotEmpty() ) {
                $past_alacarte->each( function ($item, $key) {
                    $item->update(['published' => false]);
                });
            }
            //\Db::table('recent_users')->delete();
        })->dailyAt('02:00');
    }
}
