@extends('admin.layout.back')
@section('content')

<style>
    /* CSS styles for the table */
    .about-photo-table {
        width: 100%;
        border-collapse: collapse;
    }

    .about-photo-table th,
    .about-photo-table td {
        padding: 10px;
        border: 1px solid #ccc;
    }
</style>

<!-- Your existing form code -->
<form method="POST" action="" enctype="multipart/form-data">
    <!-- Form fields -->
    <div class="text-center">
        <h2>Contact Link</h2>
    </div>
</form>

<!-- Display table if there are portfolios -->
@if($contactlink && count($contactlink) > 0)
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="about-photo-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Facebook</th>
                <th>Instagram</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($contactlink as $link)
            <tr>
                <td>{{ $link->title }}</td>
                <td>{{ $link->facebook_url }}</td>
                <td>{{ $link->instagram_url }}</td>
                
                <td>
                    <!-- Buttons for edit and delete -->
                    <form action="{{ route('edit-contact-clink', $link->id) }}" method="GET" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Edit
                        </button>
                    </form>
                    <form action="{{ route('delete-contact-link', $link->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this portfolio?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        
        

        </tbody>
    </table>
@else
    <p>No Links found.</p>
@endif

@endsection

