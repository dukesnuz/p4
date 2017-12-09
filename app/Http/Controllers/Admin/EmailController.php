<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Contact;
use App\Dispatcher;
use App\Campaign;

class EmailController extends Controller
{
    public function mail()
    {
        $results = Campaign::all();
        return view('admin.dispatcher.mail')->with([
            'results' => $results,
        ]);
    }

    public function send(Request $request)
    {
        $results = Campaign::with('contacts')->find($request->input('campaign'));

        $emailArray = [];

        foreach ($results->contacts as $contact) {
            if($contact->pivot->opt_out == null):
                $emailArray[] = $contact->email;
                //dd($emailArray[] = $contact->first_name);
            endif;
        }

        //dd($emailArray);
        foreach($emailArray as $email){

            $subject = $results->subject;
            $title = $results->title;
            $content = $results->content;
            $emailTo = $email;
            $first_name = 'first_name';
            $emailFrom = 'david@ajaxtransport.com';
            $nameFrom = 'David';

            Mail::send('emails.send', ['title' => $title, 'content' => $content],
            function ($message) use($subject, $emailTo, $emailFrom, $nameFrom)
            {
                $message->from($emailFrom, $nameFrom);
                $message->to($emailTo);
                $message->subject($subject);
            });
            dump($email);
        }
        dump($emailArray);
        return response()->json(['message' => 'Request completed']);

    }
}
