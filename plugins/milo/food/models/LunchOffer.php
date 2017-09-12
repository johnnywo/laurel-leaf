<?php namespace Milo\Food\Models;

use Model;
use DB;

/**
 * Lunchoffer Model
 */
class LunchOffer extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'milo_food_lunchoffers';

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
        'food' => ['Milo\Food\Models\Food', 'key' => 'food_id', 'otherKey' => 'id'] 
        ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = []; 
    public $attachMany = [];

    public function scopeListLunchoffers($query) 
    {
        $query = DB::select('SELECT * 
                            FROM milo_food_lunchoffers
                            LEFT JOIN milo_food_foods 
                            ON milo_food_lunchoffers.`food_id` = milo_food_foods.id
                            WHERE milo_food_lunchoffers.`date` >= CURDATE()
                            OR milo_food_lunchoffers.`date_until` >= CURDATE()
                            ORDER BY milo_food_lunchoffers.`date`
                            ');

        //dd($query);
        return $query;
        
    }

    public function scopeTodayLunchoffers($query)
    {
        $query = DB::select('SELECT * 
                            FROM milo_food_lunchoffers
                            LEFT JOIN milo_food_foods 
                            ON milo_food_lunchoffers.`food_id` = milo_food_foods.id
                            WHERE DATE(milo_food_lunchoffers.`date`) = CURDATE()
                            OR milo_food_lunchoffers.`date_until` >= CURDATE()
                            ORDER BY milo_food_lunchoffers.`date` DESC');

        return $query;
    }

}
