<?php namespace Milo\Event\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Milo\Event\Models\EventImage;


/**
 * Event Images Back-end Controller
 */
class EventImages extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Milo.Event', 'event', 'eventimages');
    }
}
