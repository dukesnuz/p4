<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Dispatcher;
use App\Utilities\ResetDatabase;
use App\CustomStuff\Helper;

class DispatcherController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        return view('admin.dispatcher.index');
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        //ResetDatabase::resetDatabase();

        $results = Dispatcher::orderBy('office_name')->get();
        if($results->isNotEmpty()):
            return view('admin.dispatcher.create')->with([
                'results' => $results,
            ]);;
        endif;
        return view('admin.dispatcher.create')->with([
            'results' => '',
        ]);;
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        // validate data
        $this->validate($request, [
            'office_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'telephone' => 'phone:US,BE',
            'mobile' => 'phone:US,BE',
            'fax' => 'phone:US,BE',
            'country_code' => 'numeric'

        ]);

        // Strip extra characters from numbers
        $num = new Helper();
        $telephone = $num->stripNumber($request->input('telephone'));
        $mobile = $num->stripNumber($request->input('mobile'));
        $fax = $num->stripNumber($request->input('fax'));

        $newContact = new Contact();
        $newContact->first_name = $request->input('first_name');
        $newContact->last_name = $request->input('last_name');
        $newContact->title = $request->input('title');
        $newContact->email = $request->input('email');
        $newContact->email_hash = sha1($request->input('email'));
        $newContact->telephone = $telephone;
        $newContact->mobile = $mobile;
        $newContact->mobile_carrier = $request->input('mobile_carrier');
        $newContact->extension = $request->input('extension');
        $newContact->fax = $fax;
        $newContact->country_code = $request->input('country_code');
        $newContact->save();

        // Get dispatcher from office and see if it exists
        $result = Dispatcher::find($request->input('id'));
        // If does not add to database
        if($result == null):
            $newDispatcher = new Dispatcher();
            $newDispatcher->office_name = $request->input('office_name');
            $newDispatcher->save();
        endif;
        // If does exist do nothing
        return redirect('/dispatcher/create')->with('sessionMessage',
        'Success! '. $request->input('first_name').' '.$request->input('last_name').' has been entered.');

    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function officeShow()
    {
        $dispatchers = Dispatcher::all();
        return view('admin.dispatcher.officeshow')->with([
            'dispatchers' => $dispatchers,
        ]);
    }

    public function contactShow($id)
    {
        // below is id for dispatch table
        // get all contacts who are associated with this dispatcher id table
        $dispatcher = Dispatcher::find($id);

        $contacts = Contact::all();
        return view('admin.dispatcher.contactshow')->with([
            'contacts' => $contacts,
            'dispatcher' => $dispatcher,
        ]);
    }
    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function contactEdit($id)
    {
        $contact = new Contact();
        $contact = $contact->find($id);

        return view('admin.dispatcher.contactedit')->with([
            'contact' => $contact,
        ]);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function contactUpdate(Request $request, $id)
    {
        // validate data
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'telephone' => 'phone:US,BE',
            'mobile' => 'phone:US,BE',
            'fax' => 'phone:US,BE',
            'country_code' => 'numeric'
        ]);

        // Strip extra characters from numbers
        $num = new Helper();
        $telephone = $num->stripNumber($request->input('telephone'));
        $mobile = $num->stripNumber($request->input('mobile'));
        $fax = $num->stripNumber($request->input('fax'));

        $updatedContact = new Contact();
        $updatedContact = $updatedContact->find($id);

        $updatedContact->first_name = $request->input('first_name');
        $updatedContact->last_name = $request->input('last_name');
        $updatedContact->title = $request->input('title');
        $updatedContact->email = $request->input('email');
        $updatedContact->email_hash = sha1($request->input('email'));
        $updatedContact->telephone = $telephone;
        $updatedContact->mobile = $mobile;
        $updatedContact->mobile_carrier = $request->input('mobile_carrier');
        $updatedContact->extension = $request->input('extension');
        $updatedContact->fax = $fax;
        $updatedContact->country_code = $request->input('country_code');
        $updatedContact->save();

        return redirect('/dispatcher/office/show')->with('sessionMessage',
        'Success! '. $request->input('first_name').' '.$request->input('last_name').' has been updated.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    # Delete the book and return visitor to list of all books.
    public function officeDestroy(Request $request)
    {
        //ResetDatabase::resetDatabase();
        $dispatcher = Dispatcher::where('id', '=', $request->input('id') )->delete();
        return redirect('/dispatcher/office/show')->with('sessionMessage', "$request->office_name was deleted.");
    }

}
