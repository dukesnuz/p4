{{-- Display a list of dispatch offices --}}
@extends('layouts.master-admin')

@section('title')
Show dispatch office
@endsection

@section('content')
<h2>Dispatch Offices</h2>
<ul>
    @foreach ($dispatchers as $dispatcher)
    <li><a href='contact/{{ $dispatcher['id'] }}/show/'>{{ $dispatcher['office_name'] }}</a>

        <form method='POST' action='/dispatcher/office/delete'>
            {{ method_field('put') }}

            {{ csrf_field() }}
            <input type='hidden' name='id' id='id' value='{{ $dispatcher['id'] }}'>
            <input type='hidden' name='office_name' value='{{ $dispatcher['office_name'] }}'>
            <input class="btn btn-danger" type='submit' value='Delete' class='btn btn-primary btn-small'>
        </form>

    </li>
    @endforeach
</ul>
@endsection
