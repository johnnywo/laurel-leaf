<?php namespace Milo\Food\Components;

use Cms\Classes\ComponentBase;
use Milo\Food\Models\LunchOffer;
use Carbon\Carbon;

class LunchOffers extends ComponentBase
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
        $this->page['lunchoffers'] = LunchOffer::listLunchoffers();

        $this->page['week_start_date'] = $this->weekStartDate()->format('d.m.Y');
        $this->page['week_end_date'] = $this->weekEndDate()->format('d.m.Y');

        $this->page['lunchoffer_daily'] = $this->lunchOfferDaily();
        $this->page['lunchoffer_weekly'] = $this->lunchOfferWeekly();
        $this->page['lunchoffer_always_hot'] = $this->lunchOfferAlwaysHot();
        $this->page['todays_food'] = $this->lunchOfferToday();
        $this->page['weekend'] = $this->isTodayWeekend();
    }

    public function lunchOfferDaily()
    {
        $food = Lunchoffer::where('date', '>=', Carbon::today())
                            ->where('date_until', '=', NULL )
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
                            ->orWhere('date_until', '>=', Carbon::today())
                            ->where('always_hot', '=', false)
                            ->orderBy('date', 'desc')
                            ->with('food')
                            ->get();

        //dd($food);

        return $food;

    }

    public function isTodayWeekend() {
        $is_weekend = date("l") == "Saturday" || date("l") == "Sunday";
        return $is_weekend;
    }

    public function weekStartDate() 
    {
        if ($this->isTodayWeekend()) {
           $week_start_date = Carbon::now()->dayOfWeek === Carbon::SATURDAY ? true : false; 
           if ($week_start_date) {
                $week_start_date = Carbon::today()->addDays(2);
           } else {
                $week_start_date = Carbon::today()->addDays(1);
           }
        } else {
            $week_start_date = Carbon::today()->startOfWeek();
        }
        // dd($week_start_date);
        return $week_start_date;
    }

    public function weekEndDate()
    {
        $week_start_date = $this->weekStartDate();
        //dd($week_start_date);
        $week_end_date = $week_start_date->addDays(4);
        return $week_end_date;
    }

}
