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
				'time' => array('regex:/[1][1-9]:[0-5]\d|2[0]:[0][0]|[1][1-9].[0-5]\d|2[0].[0][0]$/'),
				'name' => 'required',
				'email' => 'required|email',
				'people' => 'required|integer'
			]
		);


		if ($validator->fails()) {
		    throw new \ValidationException($validator);

		} else {

			/*Spam Check*/
			$url = Input::get('url');

			//var_dump($url);

			if (isset($url) && $url == '') {
				$vars = [
				    'name' => Input::get('name'),
	                'email' => Input::get('email'),
	                'date' => Input::get('date'),
	                'time' => Input::get('time'),
	                'people' => Input::get('people'),
	                'smoker' => Input::get('smoker'),
	                'sometext' => Input::get('sometext'),
	            ];

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

	            //Mail::send('milo.reservation::mail.message', $vars, function($message) {

	            Mail::queue('milo.reservation::mail.message', $vars, function($message) use ($vars) {

	            	$message->from('web@laurel-leaf.at', 'Laurel Leaf Irish Pub Vienna');
	            	$message->to('laurelleaf1060@gmail.com', 'Laurel Leaf Staff');
                    $message->cc($vars['email'], $vars['name']);
	            	$message->subject('Reservierungsanfrage (auto-reply): ' . $vars['name']);
	            });

	            Flash::success('Reservierungsanfrage übermittelt!');
	            return Redirect::back();

			} // End if antispam test was negativ.

			Flash::error('Humans only.');
			return Redirect::back();

		}

    }
}
