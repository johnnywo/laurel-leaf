<?php namespace Milo\Food\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Food Categories Back-end Controller
 */
class FoodCategories extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Milo.Food', 'food', 'foodcategories');
    }
}
