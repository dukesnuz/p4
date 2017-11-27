{{-- Show specific contact for a dispatch office --}}
@extends('layouts.master-admin')

@section('title')
Show dispatch office
@endsection

@section('content')
<h2>{{ $dispatcher['office_name'] }}</h2>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Title</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Ext</th>
        <th>Mobile</th>
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
        <td>{{ $contact['fax'] }}</td>
        <td><a href='/dispatcher/contact/{{ $contact['id'] }}/edit'>Edit</a></td>
    </tr>
    @endforeach
</table>
@endsection
