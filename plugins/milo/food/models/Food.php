<?php namespace Milo\Food\Models;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Model;

/**
 * Food Model
 */
class Food extends Model
{
	use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'milo_food_foods';

    public $rules = [
        'name'          => 'required',
        'amount'        => 'required|numeric',
        'foodcategory'  => 'required'
    ];

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [
    	'lunchoffer' => [
    		'Milo\Food\Models\LunchOffer'
    	]
    ];
    public $hasMany = [];
    public $belongsTo = [
	    'foodcategory' => [
	    	'Milo\Food\Models\FoodCategory',
		    'key' => 'food_category_id'
	    ],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

	/**
	 * @var array List of attribute names which are json encoded and decoded from the database.
	 */
	protected $jsonable = ['allergene'];

	public function scopeListFrontendFood($query, $options = [])
	{
		extract(array_merge([
			'page' => 1,
			'perPage' => 100,
			'sort' => 'sort_order desc',
			'foodcategory' => ''
		], $options));

        // wenn eine Food Category aus dem Dropdown Menü ausgewählt wurde:
		if($foodcategory !== '') {

			if(!is_array($foodcategory)) {
				$foodcategory = [$foodcategory];
			};

			foreach ($foodcategory as $category) {
				$query->whereHas('foodcategory', function ($q) use ($category) {
					$q->where('id', '=', $category);
				});
			}
		} else {
            // sonst bei Darstellung von allen Speisen: exclude all items tagged with 'nur im Mittagsangebot'(hide_in_regular)
            $query->where('hide_in_regular', '=', false)
                ->orWhere('hide_in_regular', '=', null);
        }

		return $query->paginate($perPage, $page);
	}



}
