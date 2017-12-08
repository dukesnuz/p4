{{-- Display a list of dispatch offices --}}
@extends('layouts.master-admin')

@section('title')
Dispatch offices
@endsection

@section('content')
<h2>Dispatch Offices</h2>
@if(isset($dispatchers))
<ul class='list'>
    @foreach ($dispatchers as $dispatcher)
    <ul>
        <li><a href='office/{{ $dispatcher['id'] }}/contacts' class="button">{{ $dispatcher['office_name'] }}</a></li>
        <li><a href='/dispatcher/office/{{ kebab_case($dispatcher['office_name']) }}/{{ $dispatcher['id'] }}/delete'  class="buttonAlert" >Delete</a></li>
    </ul>
    @endforeach
</ul>
@else
<div class='sessionMessage'>
    <p>
        OOppss! There are no offices. Would you like to
        <a href='/dispatcher/contact/create'>add an office and a contact</a>?
    </p>
</div>
@endif

@endsection
