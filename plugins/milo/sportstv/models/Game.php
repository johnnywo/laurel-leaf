<?php namespace Milo\Sportstv\Models;

use Carbon\Carbon;
use Model;

/**
 * game Model
 */
class Game extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'milo_sportstv_games';

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
    	'league' => ['Milo\Sportstv\Models\League', 'key' => 'league_id'],
		'home_team' => ['Milo\Sportstv\Models\Team', 'key' => 'home_team_id'],
	    'away_team' => ['Milo\Sportstv\Models\Team', 'key' => 'away_team_id'],
    ];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function scopeNowPlus50Min($query)
	{
		return $query->where('datetime', '>=', Carbon::now()->addHours(1)->addMinutes(50));
	}

	public function scopeToday($query)
	{
		$today = Carbon::today('Europe/Vienna');
		$tomorrow = Carbon::tomorrow('Europe/Vienna');
		//dd($today);
		return $query->whereBetween('datetime', [$today, $tomorrow]);
	}

	public function beforeSave()
	/* für Konferenzen, diese bekommen die ID 1 */
	{
		if ($this->conference == 1) {
			$this->home_team_id = 1;
			$this->away_team_id = 1;
		}
	}

}
