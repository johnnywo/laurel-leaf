<?php namespace Milo\HeroImage\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Milo\HeroImage\Models\HeroImage;

/**
 * Hero Images Back-end Controller
 */
class HeroImages extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.ReorderController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Milo.HeroImage', 'heroimage', 'heroimages');
    }

}
