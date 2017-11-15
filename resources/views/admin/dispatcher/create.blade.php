@extends('layouts.master-admin')

@section('title')
    Add a dispatcher
@endsection

@push('head')

@endpush

@section('content')
    Form to add a dispatcher

	<form action='/dispatcher/dispatcher' method='POST'>
        {{ csrf_field() }}
        <p>
            <label for="office_names">Select an Office</label>
            <select id="office_names">
                <option name="office_name">Select</option>
                @foreach($results as $result):
                   <option value={{ $result->id .'-'. str_replace(' ', '', $result->office_name) }}>{{ $result->office_name }}</option>
                @endforeach
            </select>
        </p>
        <P>
            <label for='office_name'>Office Name</label>
		    <input type='text' name='office_name' id='office_name' value={{ old('office_name') }}>
        </p>
        @include('modules.error-field', ['fieldName' => 'office_name'])

		<P>
            <label for='first_name'>First Name</label>
		    <input type='text' name='first_name' value={{ old('first_name') }}>
        </p>
        @include('modules.error-field', ['fieldName' => 'first_name'])

        <p>
            <label for='last_name'>Last Name</label>
            <input type='text' name='last_name' value='Pet'>
        </p>
        @include('modules.error-field', ['fieldName' => 'last_name'])

        <p>
            <label for="title">Select a title</label>
            <select>
                 <option value=""></option>
                 <option value="dispatcher">Dispatcher</option>
                 <option value="sales">Sales</option>
            </select>
        </p>


		<button>submit</button>
	</form>
@endsection
