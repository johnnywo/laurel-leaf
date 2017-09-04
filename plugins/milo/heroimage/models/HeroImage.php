<?php namespace Milo\HeroImage\Models;

use Model;

/**
 * HeroImage Model
 */
class HeroImage extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'milo_heroimage_hero_images';

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
    public $attachOne = [
    	'image' => 'System\Models\File'
    ];
    public $attachMany = [];
}
