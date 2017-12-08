@extends('layouts.master-admin')

@section('title')
Delete an Office
@endsection

@section('content')

<p>You are deleting office {{ $nameNew }}</p>

<ul class='list'>
    <li>Would you rather <a href='/dispatcher/offices' class="button"><strong>CANCEL</strong></a> this action?</li>
    <li>
        <form method='POST' action='/dispatcher/office'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type='hidden' name='id' id='{{ $id }}' value='{{ $id }}'>
            <input class="buttonAlert" type='submit' value='Delete'>
        </form>
    </li>
</ul>
@endsection
