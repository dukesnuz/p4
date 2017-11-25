<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Dispatcher;
use App\Utilities\ResetDatabase;

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
        // maybe just get data for office_name column
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

        //Dispatcher::dump($request);
        //$telephone = str_replace(array('','-', '(',')'),'', $request->input('telephone'));
        //$mobile = str_replace(array('','-', '(',')'),'', $request->input('mobile'));
        //$fax = str_replace(array('','-', '(',')'),'', $request->input('fax'));
        // validate data
        /*$this->validate($request, [
            'office_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|numeric|size:10',
            'mobile' => 'numeric|size:10',
            'fax' => 'numeric|size:10',
            'country_code' => 'required|numeric'

        ]);*/
        //$this->validate($request, [
        //    str_replace(array('','-', '(',')'),'', 'telephone') => 'required|numeric',
        //]);

         $newContact = new Contact();
         $newContact->first_name = $request->input('first_name');
         $newContact->last_name = $request->input('last_name');
         $newContact->title = $request->input('title');
         $newContact->email = $request->input('email');
         $newContact->email_hash = sha1($request->input('email'));
         $newContact->telephone = $request->input('telephone');
         $newContact->mobile = $request->input('mobile');
         $newContact->mobile_carrier = $request->input('mobile_carrier');
         $newContact->extension = $request->input('extension');
         $newContact->fax = $request->input('fax');
         $newContact->country_code = $request->input('country_code');
         $newContact->save();

         // get dispatcher from office and see if it exists
         $result = Dispatcher::find($request->input('id'));
         // if does not add to database
         if($result == null):
            dump($result);
            $newDispatcher = new Dispatcher();
            $newDispatcher->office_name = $request->input('office_name');
            $newDispatcher->save();
            return 'added';
          endif;
         // if does do nothing
         return 'notAdded';

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($first_name, $last_name)
    {
        return view('admin.dispatcher.show')->with([
            'first_name' => $first_name,
            'last_name' => $last_name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.dispatcher.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return view('admin.dispatcher.destroy');
    }
}
