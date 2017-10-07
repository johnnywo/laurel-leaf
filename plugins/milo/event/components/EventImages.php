<?php namespace Milo\Event\Components;

use Cms\Classes\ComponentBase;
use Milo\Event\Models\EventImage;
use Carbon\Carbon;

class EventImages extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'EventImages Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $this->page['events'] = $this->index();
        //dd($this->page['events']);
    }

    public function index()
    {

        $events = EventImage::where('is_active', '=', 1)
                            ->where('event_end_date', '>=', Carbon::today())
                            ->orderBy('sort_order')
                            ->get();              
        
        return $events;

    }
}
