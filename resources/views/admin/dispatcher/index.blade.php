@extends('layouts.master-admin')

@section('title')
    Dispatcher Home
@endsection

@push('head')

@endpush

@section('content')
<h1>Dispatcher Home</h1>
<ul>
    <li><a href="/dispatcher/offices/">Show dispatch Offices</a></li>
    <li><a href="/dispatcher/create/">Add a dispatcher and office</a></li>
</ul>
@endsection
