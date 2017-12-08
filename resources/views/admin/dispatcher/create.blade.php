@extends('layouts.master-admin')

@section('title')
Add a dispatcher
@endsection

@push('head')
<script src = "/js/admin/forms.js?t=<?php echo rand(); ?>"></script>
@endpush

@section('content')
<h3>Add a dispatcher</h3>

<form action='/dispatcher/contact' method='POST'>
    {{ method_field('put') }}

    {{ csrf_field() }}

    @if($results !== '')
    <p>
        <label for='office_names'>Select an Office</label>
        <select name='office_name' id="office_names">
            <option value=''>&nbsp;</option>
            <option value='new'>Create New Office</option>
            @foreach($results as $result)
            <option value='{{ $result->id }}' {{ (old('result') == $result->id) ? 'selected' : '' }}>{{ $result->office_name }}</option>
            @endforeach
        </select>
    </p>
    @endif

    <div id='new_office'>
        <P>
            <label for='office_name'>New Office Name</label>
            <input type='text' name='office_name' id='office_name' value='{{ old('office_name') }}'>
        </p>
        <input type='text' name='id' id='id' value='{{ old('id') }}'>
    </div>
    @include('modules.error-field', ['fieldName' => 'office_name'])

    <P>
        <label for='first_name'>First Name</label>
        <input type='text' id='first_name' name='first_name' value='{{ old('first_name', 'David') }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'first_name'])

    <p>
        <label for='last_name'>Last Name</label>
        <input type='text' id='last_name' name='last_name' value='{{ old('last_name', 'Pet') }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'last_name'])

    <p>
        <label for="title">Select a title</label>
        <select name='title' id='title'>
            <option value=''>&nbsp;</option>
            <option value='dispatcher' {{ (old('title') == 'dispatcher')? 'selected' : '' }}>Dispatcher</option>
            <option value='sales' {{ (old('title') == 'sales')? 'selected' : '' }}>Sales</option>
        </select>
    </p>
    @include('modules.error-field', ['fieldName' => 'title'])

    <p>
        <label for='email'>Email</label>
        <input type='email' id='email' name='email' value='{{ old('email', 'e@e.com') }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'email'])

    <p>
        <label for='telephone'>Telephone</label>
        <input type='text' id='telephone' name='telephone' value='{{ old('telephone', '901-527-7400') }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'telephone'])

    <p>
        <label for='extension'>Ext</label>
        <input type='text' id='extension' name='extension' value='{{ old('extension') }}'>
    </p>

    <p>
        <label for='mobile'>Mobile</label>
        <input type='text' id='mobile' name='mobile' value='{{ old('mobile', '(901)230-6284') }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'mobile'])

    <p>
        <label for="mobile_carrier">Mobile Carrier</label>
        <select name='mobile_carrier' id='mobile_carrier'>
            <option value=''>&nbsp;</option>
            <option value='sprint' {{ (old('mobile_carrier') == 'sprint') ? 'selected' : '' }}>Sprint</option>
            <option value='verizon' {{ (old('mobile_carrier') == 'verizon') ? 'selected' : '' }}>Verizon</option>
        </select>
    </p>
    @include('modules.error-field', ['fieldName' => 'mobile_carrier'])

    <p>
        <label for='fax'>Fax</label>
        <input type='text' id='fax' name='fax' value='{{ old('fax', '901-527-7403') }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'fax'])

    <p>
        <label for="country_code">Select a Country Code</label>
        <select name='country_code' id='country_code'>
            <option value=''>&nbsp;</option>
            <option value='1' {{ (old('country_code') == '1') ? 'selected' : '' }}>1</option>
        </select>
    </p>
    @include('modules.error-field', ['fieldName' => 'country_code'])

    <button>submit</button>
</form>
@endsection
