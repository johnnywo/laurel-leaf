<?php namespace Milo\Reservation\Models;

use Model;

/**
 * Reservation Model
 */
class Reservation extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'milo_reservation_reservations';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
    	'datetime',
	    'name',
	    'email',
	    'people',
	    'area',
	    'message'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
