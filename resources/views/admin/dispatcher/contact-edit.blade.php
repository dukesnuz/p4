@extends('layouts.master-admin')

@section('title')
Edit a dispatch contact
@endsection

@push('head')

@endpush

@section('content')
<h3>Edit a dispatch contact</h3>

<form action='/dispatcher/contact/{{ $contact->id }}' method='POST'>
    {{ method_field('put') }}
    {{ csrf_field() }}
    <P>
        <label for='first_name'>First Name</label>
        <input type='text' id='first_name' name='first_name' value='{{ old('first_name', $contact->first_name) }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'first_name'])

    <p>
        <label for='last_name'>Last Name</label>
        <input type='text' id='last_name' name='last_name' value='{{ old('last_name', $contact->last_name) }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'last_name'])

    <p>
        <label for="title">Select a title</label>
        <select name='title' id='title'>
            <option value=''>&nbsp;</option>
            <option value='dispatcher' {{ (old('title', $contact->title) == 'dispatcher')? 'selected' : '' }}>Dispatcher</option>
            <option value='sales' {{ (old('title', $contact->title) == 'sales')? 'selected' : '' }}>Sales</option>
        </select>
    </p>
    @include('modules.error-field', ['fieldName' => 'title'])

    <p>
        <label for='email'>Email</label>
        <input type='email' id='email' name='email' value='{{ old('email', $contact->email) }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'email'])

    <p>
        <label for='telephone'>Telephone</label>
        <input type='text' id='telephone' name='telephone' value='{{ old('telephone', $contact->telephone) }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'telephone'])

    <p>
        <label for='extension'>Ext</label>
        <input type='text' id='extension' name='extension' value='{{ old('extension', $contact->extension) }}'>
    </p>

    <p>
        <label for='mobile'>Mobile</label>
        <input type='text' id='mobile' name='mobile' value='{{ old('mobile', $contact->mobile) }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'mobile'])

    <p>
        <label for="mobile_carrier">Mobile Carrier</label>
        <select name='mobile_carrier' id='mobile_carrier'>
            <option value=''>&nbsp;</option>
            <option value='sprint' {{ (old('mobile_carrier', $contact->mobile_carrier) == 'sprint') ? 'selected' : '' }}>Sprint</option>
            <option value='verizon' {{ (old('mobile_carrier', $contact->mobile_carrier) == 'verizon') ? 'selected' : '' }}>Verizon</option>
        </select>
    </p>
    @include('modules.error-field', ['fieldName' => 'mobile_carrier'])

    <p>
        <label for='fax'>Fax</label>
        <input type='text' id='fax' name='fax' value='{{ old('fax', $contact->fax) }}'>
    </p>
    @include('modules.error-field', ['fieldName' => 'fax'])

    <p>
        <label for="country_code">Select a Country Code</label>
        <select name='country_code' id='country_code'>
            <option value=''>&nbsp;</option>
            <option value='1' {{ (old('country_code', $contact->country_code) == '1') ? 'selected' : '' }}>1</option>
        </select>
    </p>
    @include('modules.error-field', ['fieldName' => 'country_code'])

    <button type='submit'>Update</button>
</form>
@endsection
