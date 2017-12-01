@extends('layouts.master-admin')

@section('title')
Send Email
@endsection

@section('content')
<h3>Send Mail</h3>

<form action='/dispatcher/send' method='POST'>
    {{ method_field('put') }}
    {{ csrf_field() }}
    <p><label>First Name</label>
    <input type='text' name='first_name' value='David'></p>
    <p><label>Email</label>
    <input type='email' name='email' value='hello@dukesnuz.com'></p>
    <p><label>Title</label>
    <input type='text' name='title' value='Email Title'></p>
    <p><label>Body</label>
    <input type='text' name='content' value='Email Body'></p>
    <p><input class="button" type='submit' value='Send Mail'></p>
</form>
@endsection
