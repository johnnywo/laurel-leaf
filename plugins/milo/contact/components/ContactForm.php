<?php namespace Milo\Contact\Components;

use Cms\Classes\ComponentBase;
use Input;
use Mail;
use Validator;
use Redirect;
use Flash;
use Milo\Contact\Models\Contact;

class ContactForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'ContactForm Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onSubmitContactForm()
    {

        $validator = Validator::make(
            [
                'name' => Input::get('name'),
                'email' => Input::get('email'),
                'message' => Input::get('message'),
                'file' => Input::file('file')
            ],
            [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
                'file' => 'mimes:jpeg,jpg,png,gif,bmp,pdf|max:3000'
            ]
        );

        // dd(Input::file('files'));


        if ($validator->fails()) {
            //throw new \ValidationException($validator);
            Flash::error('Uups, es ist ein Fehler passiert.');
            return Redirect::back()->withErrors($validator);

        } else {

            /*Spam Check*/
            $url = Input::get('url');

            //var_dump($url);

            if (isset($url) && $url == '') {

                
                $vars = [
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'subject' => Input::get('subject'),
                    'nachricht' => Input::get('message'),
                    'file' => Input::file('file')
                ];

                //dd($vars['file']);

                Contact::create([
                    'name' => $vars['name'],
                    'email' => $vars['email'],
                    'subject' => $vars['subject'],
                    'message' => $vars['nachricht'],
                    'file' => $vars['file']
                ]);

                Mail::send('milo.contact::mail.message', $vars, function($message) {

                    $message->from(Input::get('email'), Input::get('name'));
                    //$message->to('1060@laurel-leaf.at', 'Laurel Leaf Irish Pub');
                    //$message->cc('laurelleaf1060@gmail.com', 'Laurel Leaf GMail');
                    $message->bcc([
                        Input::get('email') => Input::get('name'), 
                        'emil@zeero.at' => 'Milo' 
                    ]);
                    $message->subject('Nachricht an Laurel Leaf (auto-reply)');
                    $message->attach(Input::file('file'));
                });

                Flash::success('Nachricht übermittelt!');
                return Redirect::back();

            } // End if antispam test was negativ.

            Flash::error('Humans only.');
            return Redirect::back();

        } 
    }
}
