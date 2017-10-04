<?php namespace Milo\Contact\Components;

use Cms\Classes\ComponentBase;
use Input;
use Request;
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

    public function onRun() 
    {

    }

    public function onSubmitContactForm()
    {
         //dd(Input::file('file'));

        //dd($file);

        if (
            Request::hasFile('file') &&
            Request::file('file')->isValid()
        ) {
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
                    'file' => 'mimes:jpeg,png,gif,pdf|max:2000'     
                ]
            );
        } else {
            $validator = Validator::make(
                [
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'message' => Input::get('message')
                ],
                [
                    'name' => 'required',
                    'email' => 'required|email',
                    'message' => 'required'
                ]
            );
        }

        if ($validator->fails()) {
            Flash::error('Uups, es ist ein Fehler passiert.');
            return Redirect::back()->withErrors($validator);

        } else {

            /*Spam Check*/
            $url = Input::get('url');

            if (isset($url) && $url == '') {

                $newContact = Contact::create([
                    'name' => Input::get('name'),
                    'email' => Input::get('email'),
                    'subject' => Input::get('subject'),
                    'message' => Input::get('message'),
                    'file' => Input::file('file')
                ]);
                
                $vars = [
                    'name' => $newContact->name,
                    'email' => $newContact->email,
                    'subject' => $newContact->subject,
                    'nachricht' => $newContact->message,
                    'file' => $newContact->file
                ];

                Mail::send('milo.contact::mail.message', $vars, function ($message) use ($vars) {

                    $message->from(Input::get('email'), Input::get('name'));
                    //$message->to('1060@laurel-leaf.at', 'Laurel Leaf Irish Pub');
                    //$message->cc('laurelleaf1060@gmail.com', 'Laurel Leaf GMail');
                    $message->bcc([
                        Input::get('email') => Input::get('name'), 
                        'emil@zeero.at' => 'Milo' 
                    ]);
                    $message->subject('Nachricht an Laurel Leaf');

                    if ( Input::file('file') ) {
                        $message->attach($vars['file']->path);
                    }
                });

                Flash::success('Nachricht übermittelt!');
                return Redirect::back();

            } // End if antispam test was negativ.

            Flash::error('Humans only.');
            return Redirect::back();

        } 
    }
}
