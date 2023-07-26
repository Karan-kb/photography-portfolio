@extends('admin.layout.back')
@section('content')

<div class="text-center">
    <h2>Admin Details</h2>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if($admin && count($admin) > 0)
    <div class="table-container">
        <div class="table-scroll">
            <table class="contact-table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admin as $ad)
                    <tr>
                        <td class="table-cell">{{ $ad->name }}</td>
                        <td class="table-cell">{{ $ad->description }}</td>
                        <td class="table-cell">{{ $ad->phone}}</td>
                        <td class="table-cell">{{ $ad->email}}</td>
                        <td class="table-cell">{{ $ad->password}}</td>
                        <td class="table-cell">
                            <form action="{{route('edit-admin', $ad->id)}}" method="GET" style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>

                            {{-- <form action="{{route('delete-admin', $ad->id)}}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
<p>No Admins found.</p>
@endif

@endsection

<style>
    .contact-table {
        width: auto;
        border-collapse: collapse;
    }

    .contact-table th,
    .contact-table td {
        border: 1px solid #ccc;
        padding: 10px;
    }

    .table-cell:last-child {
        border-right: none;
    }

    .table-cell:first-child {
        border-left: none;
    }

    .table-container {
        overflow-x: auto;
        max-width: 100%;
    }
</style>
