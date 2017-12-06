{{-- Display a list of dispatch offices --}}
@extends('layouts.master-admin')

@section('title')
Show dispatch office
@endsection

@push('head')

@endpush

@section('content')
<h2>Dispatch Offices</h2>
<ul class='list'>
    <p id='click'>click</p>
    @foreach ($dispatchers as $dispatcher)
    <li><a href='office/{{ $dispatcher['id'] }}/contacts' class="button">{{ $dispatcher['office_name'] }}</a>

        <form method='POST' action='/dispatcher/office/destroy'>

            {{ method_field('put') }}

            {{ csrf_field() }}

            <input type='hidden' name='id' id='{{ $dispatcher['id'] }}' value='{{ $dispatcher['id'] }}'>
            <input class="buttonAlert" type='submit' value='Delete'>
        </form>

    </li>
    @endforeach
</ul>
@endsection

<script>
function deleteOffice() {
    console.log('delete');
}
// Veryfy if user wants to delete the office
window.onload = function() {
    $('click').addEventListener('mouseover', function(e) {
        deleteOffice();
        console.log(e.target);
        e.preventDefault();
    }, true);
}
</script>
