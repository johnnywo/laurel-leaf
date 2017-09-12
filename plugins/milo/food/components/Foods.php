<?php namespace Milo\Food\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Milo\Food\Models\Food;
use Milo\Food\Models\FoodCategory;
use Milo\Food\Models\Like;
use October\Rain\Support\Facades\Flash;

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

    /*
     * Page Execution Lifecycle
     */
	public function onRun() {
		$this->prepareVars();
	}

	/*
	 * Page Partial Updates through Ajax
	 */
	public function onFilterCategories() {
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

		$this->page['foods'] = Food::listFrontendFood($options);
		$this->page['categories'] = FoodCategory::all();
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


	public function onLikeFood()
	{

		$request_ip = request()->ip();

		$request_food_id = Input::get('id');

		if ($request_ip !== '') {

			// ist diese IP bereits in der Tabelle enthalten?
			if (Like::where('ip', $request_ip)->get()->last()) {

				$like_exists = Like::where('ip', $request_ip)->get()->last();

				// Falls ja, wurde das letzte mal innerhalb der letzten 3h geklickt?
				if (Carbon::now()->subHours(3) <= $like_exists->created_at)  {

					//	wenn nein (also Versuch mehrmals hintereinander zu klicken), Datensatz verwerfen und Flash Message ausgeben: Bewertung nur 1x pro Tag zulässig.
					Flash::warning('Like nur 1x pro Tag möglich');
					return back();
				}

			}

			// wenn nein, Datensatz erstellen
			Like::create([
				'ip' 		=> $request_ip,
				'food_id'	=> $request_food_id
			]);

			// SELECT food_id count(*) FROM milo_food_guest_likes WHERE food_id = 3
			$count_food_id = Like::where('food_id', '=', $request_food_id)->count();


			$this->page['count_likes_food_id'] = $count_food_id;

		}

	}





}
