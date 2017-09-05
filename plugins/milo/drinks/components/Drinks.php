<?php namespace Milo\Drinks\Components;

use Cms\Classes\ComponentBase;
use Milo\Drinks\Models\Drink;

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

	public function draught()
	{
		$drink = Drink::where('drink_category_id', '=', 1)
			->get();

		return $drink;
	}

	public function bottles()
	{
		$drink = Drink::where('drink_category_id', '=', 2)
		              ->get();

		return $drink;
	}

	public function craftBeer()
	{
		$drink = Drink::where('drink_category_id', '=', 3)
		              ->get();

		return $drink;
	}

	public function ciderDraught()
	{
		$drink = Drink::where('drink_category_id', '=', 4)
		              ->get();

		return $drink;
	}

	public function ciderBottles()
	{
		$drink = Drink::where('drink_category_id', '=', 5)
		              ->get();

		return $drink;
	}

	public function wine()
	{
		$drink = Drink::where('drink_category_id', '=', 6)
		              ->get();

		return $drink;
	}

	public function whiskey()
	{
		$drink = Drink::where('drink_category_id', '=', 7)
		              ->get();

		return $drink;
	}

	public function spirits()
	{
		$drink = Drink::where('drink_category_id', '=', 8)
		              ->get();

		return $drink;
	}

	public function longDrinks()
	{
		$drink = Drink::where('drink_category_id', '=', 9)
		              ->get();

		return $drink;
	}

	public function shots()
	{
		$drink = Drink::where('drink_category_id', '=', 10)
		              ->get();

		return $drink;
	}

	public function spiritsBottles()
	{
		$drink = Drink::where('drink_category_id', '=', 11)
		              ->get();

		return $drink;
	}

	public function combiBottles()
	{
		$drink = Drink::where('drink_category_id', '=', 12)
		              ->get();

		return $drink;
	}

	public function nonAlcoholicDrinks()
	{
		$drink = Drink::where('drink_category_id', '=', 13)
		              ->get();

		return $drink;
	}

	public function hotDrinks()
	{
		$drink = Drink::where('drink_category_id', '=', 14)
		              ->get();

		return $drink;
	}
}
