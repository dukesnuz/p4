@extends('layouts.master-admin')

@section('title')
Admin Home
@endsection

@section('content')
        <header>
            <h2>Administrator Home</h2>
        </header>

        <p>Temp. link to demonstrate use of other subdomains that will be used</p>
        <p><a href="http://dispatch.<?php echo Config('constants.domain'); ?>">Dispatch</a></p>
@endsection
