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
        <h2>All Team Members</h2>
    </div>
</form>

<!-- Display table if there are portfolios -->
@if($team && count($team) > 0)
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="portfolio-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Image</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($team as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->position }}</td>
                    <td>
                        @foreach(json_decode($team->images) as $image)
                            <img src="{{ asset('images/' . $image) }}" alt="Portfolio Image" width="100">
                        @endforeach
                    </td>
                    <td>
                        <!-- Buttons for edit and delete -->
                        <form action="{{ route('edit-team', $team->id) }}" method="GET" style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Edit
                            </button>
                        </form>
                        <form action="{{ route('delete-team', $team->id) }}" method="POST" style="display:inline-block;">
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
    <p>No teams found.</p>
@endif

@endsection
