<?php namespace Milo\Drinks\Models;

use Model;

/**
 * Drink Model
 */
class Drink extends Model
{

	use \October\Rain\Database\Traits\Sortable;
	use \October\Rain\Database\Traits\Validation;
    /**
     * @var string The database table used by the model.
     */
    public $table = 'milo_drinks_drinks';

    public $rules = [

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
    	'drinkcategory' => [
    		'\Milo\Drinks\Models\DrinkCategory',
		    'key' => 'drink_category_id'
	    ]
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public $jsonable = ['allergene'];

	public function scopeRemoveDuplicate($query)
	{
		return $query->select('name', 'description', 'allergene')
			->distinct();
    }

	public function scopeListFrontendDrink($query, $options = [])
	{
		extract(array_merge([
			'page' => 1,
			'perPage' => 150,
			'sort' => 'created_at desc',
			'drinkcategory' => ''
		], $options));

		if($drinkcategory !== '') {

			if(!is_array($drinkcategory)) {
				$drinkcategory = [$drinkcategory];
			};

			foreach ($drinkcategory as $category) {
				$query->whereHas('drinkcategory', function ($q) use ($category) {
					$q->where('id', '=', $category);
				});
			}
		}

//		$query->orderBy('sort_order');

		return $query->paginate($perPage, $page);
	}

}
