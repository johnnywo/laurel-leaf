<?php namespace Milo\Food\Components;

use Cms\Classes\ComponentBase;
use Milo\Food\Models\Lunchoffer;

class Lunchoffers extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Lunchoffers Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    /*
     * Page Execution Lifecycle
     */
    public function onRun() {
        $this->page['lunchoffers'] = Lunchoffer::listLunchoffers();
        $this->page['todays_food'] = Lunchoffer::todayLunchoffers();
    }
}
