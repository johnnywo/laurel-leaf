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
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [
	    'foodcategory' => ['Milo\Food\Models\FoodCategory', 'key' => 'food_category_id']
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

}
