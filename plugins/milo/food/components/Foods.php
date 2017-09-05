<?php namespace Milo\Food\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Milo\Food\Models\Food;

class Foods extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Food Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

	public function burger()
	{
		$food = Food::where('food_category_id', '=', 1)
				->get();

		return $food;
    }

	public function koerberl()
	{
		$food = Food::where('food_category_id', '=', 2)
		            ->get();

		return $food;
	}

	public function classics()
	{
		$food = Food::where('food_category_id', '=', 3)
		            ->get();

		return $food;
	}

	public function riesenSchwarzBrote()
	{
		$food = Food::where('food_category_id', '=', 4)
		            ->get();

		return $food;
	}

	public function salate()
	{
		$food = Food::where('food_category_id', '=', 5)
		            ->get();

		return $food;
	}

	public function nachSpeisen()
	{
		$food = Food::where('food_category_id', '=', 6)
		            ->get();

		return $food;
	}

	public function onShowBurger()
	{
		$food = Food::where('food_category_id', '=', 1)
		            ->get();

		return $food;
	}


	public function onTodaysFoodChoice()
	{
		$this->page['food_choice'] = Input::get('id');

//		this is not working: dd($this->page['food_choice']);

		if( ! isset($this->page['food_choice'])) {
			$input = $this->page['food_choice'];
			Session::put('food_choice', $input);
			$this->page['counter'] = count(Session::get('food_choice'));
		}

		if( isset($this->page['food_choice'])) {
			$input = $this->page['food_choice'];
			Session::push('food_choice', $input);
			$this->page['counter'] = count(Session::get('food_choice'));
		}
	}


	/**
	 * @return array
	 * clear Session items
	 * make an Ajax update to the partial
	 */
	public function onRefreshTime()
	{

		Session::forget('food_choice');

		$this->page['counter'] = count(Session::get('food_choice'));

		return Redirect::to('/food');
	}

}
