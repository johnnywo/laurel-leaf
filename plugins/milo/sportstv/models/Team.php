<?php namespace Milo\Sportstv\Models;

use Model;

/**
 * team Model
 */
class Team extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'milo_sportstv_teams';

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
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
