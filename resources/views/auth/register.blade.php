@extends('layouts.master-admin')

@section('content')
<h3>Register</h3>
<form method="POST" action="{{ route('register') }}" >
    {{ csrf_field() }}
    <p>
        <label for="first_name">First Name</label>
        <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" autofocus placeholder="required">
    </p>
    @include('modules.error-field', ['fieldName' => 'first_name'])
    <p>
        <label for="last_name">Last Name</label>
        <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" placeholder="required">
    </p>
    @include('modules.error-field', ['fieldName' => 'last_name'])
    <p>
        <label for="email">Email Address</label>
        <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="required">
    </p>
    @include('modules.error-field', ['fieldName' => 'email'])
    <p>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" placeholder="required min. 6 characters">
    </p>
    <p>
        <label for="password-confirm">Confirm Password</label>
        <input id="password-confirm" type="password" name="password_confirmation">
    </p>
    @include('modules.error-field', ['fieldName' => 'password'])
    <p>
        <button type="submit">Register</button>
    </p>
</form>
@endsection
