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
        <h2>About Photos</h2>
    </div>
</form>

<!-- Display table if there are portfolios -->
@if($about_photos && count($about_photos) > 0)
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="about-photo-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($about_photos as $about_photo)
            <tr>
                <td>{{ $about_photo->title }}</td>
                <td>{{ $about_photo->description }}</td>
                <td>
                    @if (is_array($about_photo->images) && count($about_photo->images) > 0)
                        @foreach($about_photo->images as $image)
                            <img src="{{ asset('images/' . $image) }}" alt="About Photo Image" width="100">
                        @endforeach
                    @else
                        <p>No images found.</p>
                    @endif
                </td>
                <td>
                    <!-- Buttons for edit and delete -->
                    <form action="{{ route('edit-about-extra-photo', $about_photo->id) }}" method="GET" style="display: inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            Edit
                        </button>
                    </form>
                    <form action="{{ route('delete-about-extra-photo', $about_photo->id) }}" method="POST" style="display:inline-block;">
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
    <p>No Authors found.</p>
@endif

@endsection

