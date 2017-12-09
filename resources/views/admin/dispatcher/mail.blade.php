@extends('layouts.master-admin')

@section('title')
Send Email
@endsection

@section('content')
<h3>Send Email Campaigns</h3>

<form action='/dispatcher/send' method='POST'>
    {{ method_field('put') }}
    {{ csrf_field() }}
    <p>
        <label for='campaign'>Select a campaign</label>
        <select name='campaign' id='campaign'>
            <option value=''>&nbsp;</option>
            @foreach($results as $result)
            <option value='{{ $result->id }}' {{ (old('result') == $result->id) ? 'selected' : '' }}>{{ $result->name }}</option>
            @endforeach
        </select>
    </p>
    <p><input class="button" type='submit' value='Send Mail'></p>
</form>
@endsection
