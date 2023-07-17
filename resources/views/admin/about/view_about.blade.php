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
<form method="POST" action="{{route('view-about-photo')}}" enctype="multipart/form-data">
    <!-- Form fields -->
    <div class="text-center">
        <h2>All Home Photos</h2>
    </div>
</form>

<!-- Display table if there are portfolios -->
@if($about && count($about) > 0)
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
                <th>Photos Taken</th>
                <th>Projects Completed</th>
                <th>Cups of Coffee</th>
                <th>Clients Working</th>
                

                <th>Image</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($about as $about)
                <tr>
                    <td>{{ $about->title }}</td>
                    <td>{{ $about->description }}</td>
                    <td>{{ $about->photos_taken }}</td>
                    <td>{{ $about->projects_completed }}</td>
                    <td>{{ $about->cups_of_coffee }}</td>
                    <td>{{ $about->clients_working }}</td>
                    <td>
                        @foreach(json_decode($about->images) as $image)
                            <img src="{{ asset('images/' . $image) }}" alt="About Image" width="100">
                        @endforeach
                    </td>
                    <td>
                        <!-- Buttons for edit and delete -->
                        <form action="{{ route('edit-about-photo', $about->id) }}" method="GET" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Edit
                            </button>
                        </form>
                        <form action="{{ route('delete-about-photo', $about->id) }}" method="POST" style="display:inline-block;">
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
    <p>No Details found.</p>
@endif

@endsection
