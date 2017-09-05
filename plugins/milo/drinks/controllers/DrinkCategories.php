<?php namespace Milo\Drinks\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Drink Categories Back-end Controller
 */
class DrinkCategories extends Controller
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

        BackendMenu::setContext('Milo.Drinks', 'drinks', 'drinkcategories');
    }
}
