@extends('layouts.master')

@section('title')
    Add a dispatcher
@endsection

@section('content')
    Form to add a dispatcher

	<form action='/dispatcher/dispatcher' method='POST'>
        {{ csrf_field() }}
        <p>
            <label for="office_name">Select an Office</label>
            <select>
                <option name="office_name">Select</option>
                @foreach($results as $result):
                   <option value={{ $result->office_name }}>{{ $result->office_name }}</option>
                @endforeach
            </select>
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

		<button>submit</button>
	</form>
@endsection
