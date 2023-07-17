@extends('admin.layout.back')
@section('content')

<style>
    /* CSS styles for the table */
    .portfolio-table {
        width: 100%;
        border-collapse: collapse;
    }

    .portfolio-table th,
    .portfolio-table td {
        padding: 10px;
        border: 1px solid #ccc;
    }
</style>

<!-- Your existing form code -->
<form method="POST" action="" enctype="multipart/form-data">
    <!-- Form fields -->
    <div class="text-center">
        <h2>About Author</h2>
    </div>
</form>

<!-- Display table if there are portfolios -->
@if($about_authors && count($about_authors) > 0)
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="portfolio-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($about_authors as $about_author)
                <tr>
                    <td>{{ $about_author->title }}</td>
                    <td>{{ $about_author->description }}</td>
                    <td>
                        @foreach(json_decode($about_author->image) as $image)
                            <img src="{{ asset('images/' . $image) }}" alt="Portfolio Image" width="100">
                        @endforeach
                    </td>
                    <td>
                        <!-- Buttons for edit and delete -->
                        <form action="{{ route('edit-about-author', $about_author->id) }}" method="GET" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Edit
                            </button>
                        </form>
                        {{-- <form action="{{ route('delete-portfolio', $portfolio->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this portfolio?')">Delete</button>
                        </form> --}}
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
@else
    <p>No Authors found.</p>
@endif

@endsection
