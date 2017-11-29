{{-- Display a list of dispatch offices --}}
@extends('layouts.master-admin')

@section('title')
Show dispatch office
@endsection

@section('content')
<h2>Dispatch Offices</h2>
<ul class='list'>
    @foreach ($dispatchers as $dispatcher)
    <li><a href='office/{{ $dispatcher['id'] }}/contacts' class="button">{{ $dispatcher['office_name'] }}</a>

        <form method='POST' action='/dispatcher/office/delete'>

            {{ method_field('put') }}

            {{ csrf_field() }}

            <input type='hidden' name='id' value='{{ $dispatcher['id'] }}'>
            <input type='hidden' name='office_name' value='{{ $dispatcher['office_name'] }}'>
            <input class="buttonAlert" type='submit' value='Delete'>
        </form>

    </li>
    @endforeach
</ul>
@endsection
