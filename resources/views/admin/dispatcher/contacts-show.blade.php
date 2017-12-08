{{-- Show specific contact for a dispatch office --}}
@extends('layouts.master-admin')

@section('title')
Office {{ $dispatcher['office_name'] }} contacts
@endsection

@section('content')
<h2>{{ $dispatcher['office_name'] }}</h2>

@if(isset($contacts))
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Title</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Ext</th>
        <th>Mobile</th>
        <th>Carrier</th>
        <th>Fax</th>
        <th>Edit</th>
    </tr>
    @foreach ($contacts as $contact)
    <tr>
        <td>{{ $contact['first_name'] }}</td>
        <td>{{ $contact['last_name'] }}</td>
        <td>{{ $contact['title'] }}</td>
        <td>{{ $contact['email'] }}</td>
        <td>{{ $contact['telephone'] }}</td>
        <td>{{ $contact['extension'] }}</td>
        <td>{{ $contact['mobile'] }}</td>
        <td>{{ $contact['mobile_carrier'] }}</td>
        <td>{{ $contact['fax'] }}</td>
        <td><a href='/dispatcher/office/contact/{{ $contact['id'] }}/edit'>Edit</a></td>
    </tr>
    @endforeach
</table>
@else
<div class='sessionMessage'>
    <p>
        OOppss! There are no dispatch contacts for this office. Would you like to
        <a href='/dispatcher/contact/create'>add a contact</a>?
    </p>
</div>
@endif

@endsection
