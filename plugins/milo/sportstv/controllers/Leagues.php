<?php namespace Milo\Sportstv\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Leagues Back-end Controller
 */
class Leagues extends Controller
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

        BackendMenu::setContext('Milo.Sportstv', 'sportstv', 'leagues');
    }
}
