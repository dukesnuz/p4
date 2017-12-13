@extends('layouts.master-admin')

@section('title')
Reset Password
@endsection

@section('content')

<h3>Reset Password</h3>

<form method='POST' action='{{ route('password.request') }}'>
    {{ csrf_field() }}

    <input type='hidden' name='token' value='{{ $token }}'>

    <p>
        <label for='email'>Email Address</label>
        <input id='email' type='email' name='email' value='{{ $email or old('email') }}' required autofocus>
    </p>
    @include('modules.error-field', ['fieldName' => 'email'])

    <p>
        <label for='password'>Password</label>
        <input id='password' type='password' name='password' required>
    </p>
    @include('modules.error-field', ['fieldName' => 'password'])

    <p>
        <label for='password-confirm'>Confirm Password</label>
        <input id='password-confirm' type='password' name='password_confirmation' required>
    </p>
    <strong>@include('modules.error-field', ['fieldName' => 'password_confirmation'])</strong>
    <p><button type='submit'>Reset Password</button></p>
</form>
@endsection
