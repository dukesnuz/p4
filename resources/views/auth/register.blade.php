@extends('layouts.master-admin')

@section('content')
<h3>Register</h3>
<form method="POST" action="{{ route('register') }}" >
    {{ csrf_field() }}
    <p>
        <label for="name">First Name</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus placeholder="required">
    </p>
    @include('modules.error-field', ['fieldName' => 'name'])
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
