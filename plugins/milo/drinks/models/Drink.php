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
    	'drinkcategory' => ['\Milo\Drinks\Models\DrinkCategory', 'key' => 'drink_category_id']
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

}
