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
        // Validate a campaign was selected
        $this->validate($request, [
            'campaign' => 'required|numeric',
        ],
        $messages = [
            'campaign.required' => 'Please select a campaign',
            'campaign.numeric' => 'OOPS! System error',
        ]);

        // Grab contact, pivot and campaign table data
        $results = Campaign::with('contacts')->find($request->input('campaign'));

        $emailData = [];
        // Biuld an array of names and addresses
        foreach ($results->contacts as $contact) {
            if($contact->pivot->opt_out == null):
                $emailData[] = explode(',', $contact->first_name.','.$contact->email);
            endif;
        }

        // Loop through the email addresses and send mail
        foreach($emailData as $email){

            $subject = $results->subject;
            $title = $results->title;
            $content = $results->content;
            $emailTo = $emailData[0][1];
            $first_name = $emailData[0][0];
            $emailFrom = 'david@ajaxtransport.com';
            $nameFrom = 'David';
            /*
            Mail::send('emails.send', ['title' => $title, 'content' => $content],
            function ($message) use($emailFrom, $nameFrom, $emailTo, $subject, $first_name)
            {
            $message->from($emailFrom, $nameFrom);
            $message->to($emailTo, $first_name);
            $message->subject($subject);
        });
        */
    }

    $data = ['message' => 'Success. Emails have been sent.'];
    return response()->view('admin.dispatcher.mail', $data, 200);
}
}
