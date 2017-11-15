<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use App\Dispatcher;


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
        // maybe just get data for office_name column  
        $results = Dispatcher::all();
        if($results->isNotEmpty()):
            return view('admin.dispatcher.create')->with([
                 'results' => $results,
            ]);;
        endif;
        return view('admin.dispatcher.create')->with([
             'results' => "null",
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
            'first_name' => 'required',
            'last_name' => 'required'
        ]);
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');

        #code here to add to database
        Contact::insert([
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
            'first_name' => $first_name,
            'last_name' => $last_name,
            'title' => 'dispatcher',
            'email' => 'email',
            'email_hash' => 'hash',
            'telephone' => 8,
            'mobile' => 7,
            'extension' => 6,
            'fax' => 5,
            'country_code' => 1
        ]);
        // redirect to view new input
        return redirect('dispatcher/show/'.$first_name.'/'.$last_name)->with([
            'first_name' => $first_name,
            'last_name' => $last_name
        ]);
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
