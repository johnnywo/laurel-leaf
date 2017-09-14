<?php namespace Milo\Food\Components;

use Cms\Classes\ComponentBase;
use Milo\Food\Models\Lunchoffer;
use Carbon\Carbon;

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
    

        $this->page['week_start_date'] = Carbon::now()
                                        ->startOfWeek()
                                        ->format('d.m.Y');
        $this->page['week_end_date'] = Carbon::now()
                                        ->startOfWeek()
                                        ->addDays(4)
                                        ->format('d.m.Y');

        $this->page['lunchoffer_daily'] = $this->lunchOfferDaily();
        $this->page['lunchoffer_weekly'] = $this->lunchOfferWeekly();
        $this->page['lunchoffer_always_hot'] = $this->lunchOfferAlwaysHot();
        $this->page['todays_food'] = $this->lunchOfferToday();
    }

    public function lunchOfferDaily()
    {
        $food = Lunchoffer::where('date', '>=', Carbon::today())
                            ->orderBy('date', 'asc')
                            ->with('food')
                            ->get();

        return $food;
    }

    public function lunchOfferWeekly()
    {
        $food = Lunchoffer::where('date_until', '>=', Carbon::today())
                            ->where('always_hot', '=', false)
                            ->orderBy('date', 'asc')
                            ->with('food')          
                            ->get();

        return $food;
    }

    public function lunchOfferAlwaysHot()
    {
        $food = Lunchoffer::where('date_until', '>=', Carbon::today())
                            ->where('always_hot', '=', true)
                            ->orderBy('date', 'asc')
                            ->with('food')
                            ->get();

        //dd($lunchoffers);

        return $food;
    }

    public function lunchOfferToday()
    {
        $food = Lunchoffer::where('date', '>=', Carbon::today())
                            ->where('date', '<=', Carbon::tomorrow())
                            ->orWhere('date_until', '>=', Carbon::now())
                            ->where('always_hot', '=', false)
                            ->orderBy('date', 'desc')
                            ->with('food')
                            ->get();

        //dd($food);

        return $food;

    }

}
