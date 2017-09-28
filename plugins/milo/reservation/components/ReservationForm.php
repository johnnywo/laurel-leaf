<?php namespace Milo\Reservation\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;
use Milo\Reservation\Models\Reservation;
use Flash;
use Carbon\Carbon;


class ReservationForm extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'Form Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

	public function onSend()
	{
		$validator = Validator::make(
			[
				'date' => Input::get('date'),
				'time' => Input::get('time'),
				'name' => Input::get('name'),
				'email' => Input::get('email'),
				'people' => Input::get('people')
			],
			[
				'date' => 'required|date|after:yesterday',
				'time' => array('regex:/[1][1-9]:[0-5]\d|2[0]:[0-5]\d|[1][1-9].[0-5]\d|2[0].[0][0]$/'),
				'name' => 'required',
				'email' => 'required|email',
				'people' => 'required|integer'
			]
		);



		if($validator->fails()) {
		    throw new \ValidationException($validator);
/*			return Redirect::back()
			               ->withInput()
			               ->withErrors($validator);*/
		} else {
			$vars = [
			    'name' => Input::get('name'),
                'email' => Input::get('email'),
                'date' => Input::get('date'),
                'time' => Input::get('time'),
                'people' => Input::get('people'),
                'smoker' => Input::get('smoker'),
                'sometext' => Input::get('sometext'),
            ];

			//var_dump($vars);

			$vars['datetime'] = Carbon::parse($vars['date'] . ' ' . $vars['time']);

			if($vars['smoker'] == null){
			    $vars['smoker'] = 'undefined Area';
            }



			Reservation::create([
				'name' => $vars['name'],
				'email' => $vars['email'],
				'datetime' => $vars['datetime'],
				'people' => $vars['people'],
				'area' => $vars['smoker'],
				'message' => $vars['sometext'],
			]);

			Mail::send('milo.reservation::mail.message', $vars, function($message) {

				$message->from(Input::get('email'), Input::get('name'));
				$message->to('1060@laurel-leaf.at', 'Laurel Leaf Irish Pub');
				$message->cc('laurelleaf1060@gmail.com', 'Laurel Leaf GMail');
				$message->bcc(Input::get('email'), Input::get('name'));
				$message->subject('Reservierungsanfrage (auto-reply)');
			});

			Flash::success('Reservierungsanfrage übermittelt!');
		}

    }
}
