<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Contact;

class EmailController extends Controller
{
    public function mail()
    {
        $results = Contact::orderBy('first_name')->get();
        return view('admin.dispatcher.mail')->with([
            'results' => $results,
        ]);
    }

    public function send(Request $request)
    {

        $title = $request->input('title');
        $content = $request->input('content');
        //$email = $request->input('email');
        $first_name = $request->input('first_name');

        Mail::send('emails.send', ['title' => $title, 'content' => $content], function ($message)
        {
            //$message->from('fax@ajaxtransport.com', 'fax@ajaxtransport.com');
            //$message->to('17062536984@efaxsend.com');
            $message->from('fax@ajaxtransport.com', 'Fax');
            $message->to('hello@dukeznuz.com');
        });

        return response()->json(['message' => 'Request completed']);

    }
}
