@extends('layouts.master-admin')

@section('content')
<h3>Login</h3>

<form  method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <p>
        <label for="email">Email Address</label>
        <input id="email" type="email"  name="email" value="{{ old('email') }}" autofocus>
    </p>
    <p>
        <label for="password">Password</label>
        <input id="password" type="password"  name="password">
    </p>
    @include('modules.error-field', ['fieldName' => 'email'])
    <p>
        <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </label>
    </p>
    <p>
        <button type="submit" class="">Login</button>
    </p>

    <p>
        <a href="{{ route('password.request') }}">
            Forgot Your Password?
        </a>
    </p>
</form>
@endsection
