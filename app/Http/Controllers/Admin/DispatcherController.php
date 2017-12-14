<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Dispatcher;
use App\Campaign;
use App\CustomStuff\Helper;

class DispatcherController extends Controller
{
    // Home page for admin dispatcher home
    public function index()
    {
        return view('admin.dispatcher.index');
    }

    // Display form to create a contact and office, if an office does not exits
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

    /*Store a new contact and if office name does not exist add a new office
    * For phone numbers, allowing user to use ( ) - to make it more user friendly
    * Then use stripNumber method to remove ( ) - and jsut store only the number
    */
    public function contactStore(Request $request)
    {
        // validate data
        $this->validate($request, [
            'office_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'title' => 'required',
            'email' => 'unique:contacts|email',
            'telephone' => 'phone:US,BE|regex:/^([0-9\-\)\(]+)$/',
            'mobile' => 'phone:US,BE|regex:/^([0-9\-\)\(]+)$/',
            'mobile_carrier' => 'required',
            'fax' => 'phone:US,BE|regex:/^([0-9\-\)\(]+)$/',
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

        // Get id of last record created
        $id = $newContact->id;

        // Grab all the campaign ids and create an array
        $campaignIds = Campaign::all('id');

        $campaignIdArray = [];
        foreach ($campaignIds as $campaignId) {
            $campaignIdArray[] = $campaignId->id;
        }
        // Add new contact id and campaign id to contact_campaign pivot table
        // Result = the new contact will be opted in to all current campaigns.
        $results = Contact::find($id)->campaigns()->sync($campaignIdArray);

        return redirect('/dispatcher/contact/create')->with('sessionMessage',
        'Success! '. $request->input('first_name').' '.$request->input('last_name').' has been entered.');
    }

    // Display all offices
    public function officesShow()
    {
        $dispatchers = Dispatcher::all();

        if($dispatchers->count() > 0):
            return view('admin.dispatcher.offices-show')->with([
                'dispatchers' => $dispatchers,
            ]);
        endif;

        return view('admin.dispatcher.offices-show');
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

            // Format numbers in contacts array
            foreach ($contacts as $key => $contact) {
                $fax = Helper::formatPhoneNumber($contact['fax']);
                $contact['fax'] = $fax;
                $mobile = Helper::formatPhoneNumber($contact['mobile']);
                $contact['mobile'] = $mobile;
                $telephone = Helper::formatPhoneNumber($contact['telephone']);
                $contact['telephone'] = $telephone;
            }

            if(count($contacts) > 0):
                return view('admin.dispatcher.contacts-show')->with([
                    'contacts' => $contacts,
                    'dispatcher' => $dispatcher,
                    'sessionMessage', "error",
                ]);
            endif;

            return view('admin.dispatcher.contacts-show')->with([
                'dispatcher' => $dispatcher,
            ]);
        }

        //Show the form for editing the specified contact.
        public function contactEdit($id)
        {
            $contact = new Contact();
            $contact = $contact->find($id);

            if(!$contact):
                return back()->withInput()->with('sessionMessage', 'OOppss! System Error');
            endif;

            return view('admin.dispatcher.contact-edit')->with([
                'contact' => $contact,
            ]);
        }

        // Update the specified contact in storage
        public function contactUpdate(Request $request, $id)
        {
            // validate data
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'title' => 'required',
                'email' => 'required|email',
                'telephone' => 'phone:US,BE|regex:/^([0-9\-\)\(]+)$/',
                'mobile' => 'phone:US,BE|regex:/^([0-9\-\)\(]+)$/',
                'mobile_carrier' => 'required',
                'fax' => 'phone:US,BE|regex:/^([0-9\-\)\(]+)$/',
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

        // Delete an office, takes user to page to delete or cancel
        public function officeDelete($name, $id)
        {
            $nameNew = ucfirst(str_replace('-', ' ', $name));

            return view('admin.dispatcher.office-delete')->with([
                'id' => $id,
                'nameNew' => $nameNew,
            ]);
        }

        // Delete an office, using soft delete
        public function officeDestroy(Request $request)
        {
            $result = Dispatcher::find($request->input('id'));

            if(!$result):
                return redirect('dispatcher/offices')->with('sessionMessage', "OOppss! System error! Office was not deleted.");
            endif;
            $dispatcher = Dispatcher::destroy($request->input('id'));

            return redirect('dispatcher/offices')->with('sessionMessage', "$result->office_name was deleted.");
        }

    }
