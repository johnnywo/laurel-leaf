<?php namespace Milo\Sportstv\Components;

use Cms\Classes\ComponentBase;
use Milo\Sportstv\Models\Game;
use Carbon\Carbon;

class Games extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Game Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

	public function index()
	{
		$games = Game::nowPlus50Min()
		             ->with(['home_team', 'away_team', 'league'])
		             ->orderBy('datetime')
		             ->get();

		 //dd($games);

		return $games;
    }

	public function today()
	{
		$todays_games = Game::today()
					->with(['home_team', 'away_team', 'league'])
					->get();

		return $todays_games;
    }

    public function onRun()
	{
	    $this->page['sportstv'] = Game::where('datetime', '>=', Carbon::now()->subHours(2))
	                        ->orderBy('datetime', 'asc')
	                        ->get();
	}
}
