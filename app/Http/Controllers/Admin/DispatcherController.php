<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Dispatcher;
use App\CustomStuff\Helper;
use App\Utilities\ResetDatabase;

//ResetDatabase::resetDatabase();

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
    public function contactCreate()
    {
        $results = Dispatcher::orderBy('office_name')->get();
        if($results->isNotEmpty()):
            return view('admin.dispatcher.create')->with([
                'results' => $results,
            ]);
        endif;
        return view('admin.dispatcher.create')->with([
            'results' => '',
        ]);;
    }

    /**
    * Store a new contact and if office name does not exist add a new office
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function contactStore(Request $request)
    {
        // validate data
        $this->validate($request, [
            'office_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'email' => 'required|email',
            'telephone' => 'phone:US,BE',
            'mobile' => 'phone:US,BE',
            'mobile_carrier' => 'required',
            'fax' => 'phone:US,BE',
            'country_code' => 'numeric'
        ]);

        // Strip extra characters from numbers
        $telephone = Helper::stripNumber($request->input('telephone'));
        $mobile = Helper::stripNumber($request->input('mobile'));
        $fax = Helper::stripNumber($request->input('fax'));

        // Check if office name already in dispatchers table, if not then add.
        if($request->input('id') == null):
            $dispatcher_id = Dispatcher::updateOrCreate(
                ['office_name' => $request->input('office_name')],
                ['office_name' => $request->input('office_name')]
            );
        else:
            $dispatcher_id = $request->input('id');
        endif;

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
        $newContact->dispatcher()->associate($dispatcher_id);
        $newContact->save();

        // In future redirect to add this dispatcher's address
        return redirect('/dispatcher/contact/create')->with('sessionMessage',
        'Success! '. $request->input('first_name').' '.$request->input('last_name').' has been entered.');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function officesShow()
    {
        $dispatchers = Dispatcher::all();

        return view('admin.dispatcher.offices-show')->with([
            'dispatchers' => $dispatchers,
        ]);
    }

    // Show all the contacts for a specific office
    public function contactsShow($id)
    {
        // get id for dispatcher table
        $dispatcher = Dispatcher::where('id', '=', $id)->select('id', 'office_name')->first();

        // get all contacts who are associated with this dispatcher id table
        $contacts = Contact::where([
            ['dispatcher_id', '=', $dispatcher['id']],
            ])->whereNull('deleted_at')->get();

            if(count($contacts) > 0) {
                return view('admin.dispatcher.contacts-show')->with([
                    'contacts' => $contacts,
                    'dispatcher' => $dispatcher,
                    'sessionMessage', "error",
                ]);
            }
            return view('admin.dispatcher.contacts-show')->with([
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
            if(!$contact) {
                return back()->withInput()->with('sessionMessage', "error $id");
            } else {
                return view('admin.dispatcher.contact-edit')->with([
                    'contact' => $contact,
                ]);
            }
        }

        /**
        * Update the specified resource in storage.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  int $id
        * @return \Illuminate\Http\Response
        */
        public function contactUpdate(Request $request, $id)
        {
            // validate data
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'title' => 'required',
                'email' => 'required|email',
                'telephone' => 'phone:US,BE',
                'mobile' => 'phone:US,BE',
                'mobile_carrier' => 'required',
                'fax' => 'phone:US,BE',
                'country_code' => 'numeric'
            ]);

            // Strip extra characters from numbers
            $telephone = Helper::stripNumber($request->input('telephone'));
            $mobile = Helper::stripNumber($request->input('mobile'));
            $fax = Helper::stripNumber($request->input('fax'));

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

            return redirect('/dispatcher/offices')->with('sessionMessage',
            'Success! '. $request->input('first_name').' '.$request->input('last_name').' has been updated.');
        }

        /**
        * Remove the specified resource from storage.
        *
        * @param  int  $request
        * @return \Illuminate\Http\Response
        */
        // Delete a contact, using soft delete
        public function officeDestroy(Request $request)
        {
            $dispatcher = Dispatcher::destroy($request->input('id'));
            return redirect('/dispatcher/offices')->with('sessionMessage', "$request->office_name was deleted.");
        }

    }
