@extends('layouts.master')

@section('title')
    Add a dispatcher
@endsection

@section('content')
    Form to add a dispatcher
	<form action='/' method='POST'>
		<label for='first_name'>First Name</label>
		<input type = 'text' name='first_name'>
		<button>submit</button>
	</form>
@endsection
