@extends('layouts.master-admin')

@section('title')
Reset Password
@endsection

@section('content')

<h3>Reset Password</h3>

@if (session('status'))
<div class='sessionMessage'>
    {{ session('status') }}
</div>
@endif

<form  method='POST' action='{{ route('password.email') }}'>
    {{ csrf_field() }}
    <p>
        <label for='email'>Email Address</label>
        <input id='email' type='email' name='email' value='{{ old('email') }}' required>
    </p>
    @include('modules.error-field', ['fieldName' => 'email'])

    <button type='submit'>Send Password Reset Link</button>
</form>
@endsection
