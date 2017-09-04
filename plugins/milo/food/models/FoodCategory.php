<?php namespace Milo\Food\Models;

use Model;

/**
 * FoodCategory Model
 */
class FoodCategory extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'milo_food_food_categories';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
    	'name'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [
    	'food' => 'Milo\Food\Models\Food'
    ];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
	    'image' => 'System\Models\File'
    ];
    public $attachMany = [];
}
