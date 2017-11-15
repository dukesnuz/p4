@extends('layouts.master-admin')

@section('title')
    Edit a dispatcher
@endsection

@section('content')
    edit a dispatcher
    <form action='/' method='POST'>
        <label for='first_name'>First Name</label>
        <input type = 'text' name='first_name'>
        <button>submit</button>
    </form>
@endsection
