<?php namespace Milo\Drinks\Components;

use Cms\Classes\ComponentBase;
use Milo\Drinks\Models\Drink;
use Milo\Drinks\Models\DrinkCategory;

class Drinks extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Drink Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

	/*
	 * Page Execution Lifecycle
	 */
	public function onRun() {
		$this->prepareVars();
	}

	/*
	 * Page Partial Updates through Ajax
	 */
	public function onFilterDrinkCategories() {
		$this->prepareVars();
	}

	/*
	 * if Input Options from Select Menu,
	 * add them to Array foodcategory (post('Filter', [])
	 * @var foods become available through scope Method from Plugin Class
	 * @var categories lists names of Categories for Select Menu
	 */
	public function prepareVars() {
		$options = post('Filter', []);

		$this->page['drinks'] = Drink::listFrontendDrink($options);
		$this->page['drinkcategories'] = DrinkCategory::all();
	}
}
