@extends('layouts.master-admin')

@section('title')
Admin Home
@endsection

@section('content')
<header>
    <h2>Administrator Home</h2>
</header>
@if(isset($user->first_name))
<p>{{ $user->first_name }} welcome to the administration section. Currently
    live is the administration section for dispatchers. Current features include
    add, read, edit and delete functionality for dispatch offices along with each
    office's contacts. A mail feature is also available in order to send email
    campaigns to all contacts. An administrator section for carrriers and
    shippers will be coming soon.
</P>

<p>Temporary link to demonstrate use of other subdomains that will be added. These
    subdomains will be for
    <a href="http://dispatch.<?php echo Config('constants.domain'); ?>">Dispatchers</a>,
    shippers and carriers.
</p>
@endif
@endsection
