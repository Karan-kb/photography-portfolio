@extends('admin.layout.back')
@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    <div class="text-center">
        <h2>Contact Details</h2>
    </div>
</form>
@if($contact && count($contact) > 0)

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<table class="contact-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Slogan</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contact as $contact)
        <tr>
            <td class="table-cell">{{ $contact->title }}</td>
            <td class="table-cell">{{ $contact->description }}</td>
            <td class="table-cell">{{ $contact->address}}</td>
            <td class="table-cell">{{ $contact->phone}}</td>
            <td class="table-cell">{{ $contact->email}}</td>
            <td class="table-cell">{{ $contact->slogan}}</td>
            <td class="table-cell">
                @foreach(json_decode($contact->images) as $image)
                <img src="{{ asset('images/' . $image) }}" alt="Blog Image" width="100">
                @endforeach
            </td>
            <td class="table-cell">
                <form action="{{route('edit-contact', $contact->id)}}" method="GET" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>

            <form action="{{route('delete-contact', $contact->id)}}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No Contacts found.</p>
@endif
@endsection    

<style>
    .contact-table {
        width: 100%;
        border-collapse: collapse; /* Combine border lines */
    }

    .contact-table th,
    .contact-table td {
        border: 1px solid #ccc; /* Add border to cells */
        padding: 10px;
    }

    .table-cell:last-child {
        border-right: none; /* Remove right border for last cell in each row */
    }

    .table-cell:first-child {
        border-left: none; /* Remove left border for first cell in each row */
    }
</style>
