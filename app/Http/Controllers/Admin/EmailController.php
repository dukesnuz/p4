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

        $subject = 'Subject';
        $title = $request->input('title');
        $content = $request->input('content');
        $emailTo = $request->input('email');
        $first_name = $request->input('first_name');
        $emailTo = '';
        $emailFrom = '';
        $nameFrom = '';

        Mail::send('emails.send', ['title' => $title, 'content' => $content],
        function ($message) use($subject, $emailTo, $emailFrom, $nameFrom)
        {
            $message->from($emailFrom, $nameFrom);
            $message->to($emailTo);
            $message->subject($subject);
        });

        return response()->json(['message' => 'Request completed']);

    }
}
