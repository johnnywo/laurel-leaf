<?php namespace Milo\Contact;

use Backend;
use System\Classes\PluginBase;
use Event;

/**
 * Contact Plugin Information File
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
            'name'        => 'Contact',
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
/*        Event::listen('mailer.prepareSend', function($self, $view, $message) {
            if ($view == 'laurel-leaf-contactform-template') {
                $message->from(post('email'), post('name'));
                $message->cc('laurelleaf1060@gmail.com', 'Laurel Leaf Gmail');
                $message->bcc(post('email'), post('name'));
                $message->bcc('emil.esletzbichler@gmail.com', 'Milo');
            }
        });*/
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Milo\Contact\Components\ContactForm' => 'contactForm',
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
            'milo.contact.some_permission' => [
                'tab' => 'Contact',
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
            'contact' => [
                'label'       => 'Contact',
                'url'         => Backend::url('milo/contact/contacts'),
                'icon'        => 'icon-leaf',
                'permissions' => ['milo.contact.*'],
                'order'       => 500,
            ],
        ];
    }
}
