<?php namespace Milo\Food\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Milo\Food\Models\Food;

/**
 * Foods Back-end Controller
 */
class Foods extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
	    'Backend.Behaviors.RelationController',
	    'Backend.Behaviors.ReorderController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $relationConfig = 'config_relation.yaml';
	public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Milo.Food', 'food', 'foods');
    }

}
