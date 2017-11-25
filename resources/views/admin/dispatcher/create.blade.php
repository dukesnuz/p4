@extends('layouts.master-admin')

@section('title')
    Add a dispatcher
@endsection

@push('head')

@endpush

@section('content')
    Form to add a dispatcher

	<form action='/dispatcher/dispatcher' method='POST'>
        {{ method_field('put') }}

        {{ csrf_field() }}
        @if($results !== '')
        <p>
            <label for="office_names">Select an Office</label>
            <select name='office_name' id="office_names">
                <option>Select</option>
                    @foreach($results as $result):
                        <option value={{ $result->id }}>{{ $result->office_name }}</option>
                    @endforeach
            </select>
        </p>
        @endif
        <P>
            <label for='office_name'>Office Name</label>
		    <input type='text' name='office_name' id='office_name' value={{ old('office_name') }}>
        </p>
        @include('modules.error-field', ['fieldName' => 'office_name'])

            <input type='text' name='id' id='id' value={{ old('office_value') }}>

        <P>
            <label for='first_name'>First Name</label>
		    <input type='text' name='first_name' value={{ old('first_name', 'David') }}>
        </p>
        @include('modules.error-field', ['fieldName' => 'first_name'])

        <p>
            <label for='last_name'>Last Name</label>
            <input type='text' name='last_name' value={{ old('first_name', 'Pet') }}>
        </p>
        @include('modules.error-field', ['fieldName' => 'last_name'])

        <p>
            <label for="title">Select a title</label>
            <select name='title' id='title'>
                 <option value="dispatcher">D</option>
                 <option value="dispatcher">Dispatcher</option>
                 <option value="sales">Sales</option>
            </select>
        </p>

        <p>
            <label for='email'>Email</label>
            <input type='text' id='email' name='email' value={{ old('email', 'email@example.com') }}>
        </p>
        @include('modules.error-field', ['fieldName' => 'email'])

        <p>
            <label for='telephone'>Telephone</label>
            <input type='text' id='telephone' name='telephone' value={{ old('telephone', '9015277400') }}>
        </p>
        @include('modules.error-field', ['fieldName' => 'telephone'])

        <p>
            <label for='ext'>Ext</label>
            <input type='text' id='ext' name='ext' value={{ old('ext', '201') }}>
        </p>

        <p>
            <label for='mobile'>Mobile</label>
            <input type='text' id='mobile' name='mobile' value={{ old('mobile', '9012306284') }}>
        </p>

        <p>
            <label for='mobile_carrier'>Mobile Carrier</label>
            <input type='text' id='mobile_carrier' name='mobile_carrier' value={{ old('mobile_carrier', 'sprint') }}>
        </p>

        <p>
            <label for='fax'>Fax</label>
            <input type='text' id='fax' name='fax' value={{ old('fax', '9015277403') }}>
        </p>

        <p>
            <label for="country_code">Select a Country Code</label>
            <select name='country_code' id='country_code'>
                 <option value="1">1</option>
                 <option value="1">US</option>
                 <!-- change enum in database to reflect 2 digit counrty code-->
            </select>
        </p>


		<button>submit</button>
	</form>
@endsection
