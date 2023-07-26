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
        <h2>Home Meta</h2>
    </div>
</form>

<!-- Display table if there are portfolios -->
@if(isset($homemeta) && count($homemeta) > 0)
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="portfolio-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Meta Tags</th>
                <th>Meta Description</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($homemeta as $hmeta)
                <tr>
                    <td>{{ $hmeta->title }}</td>
                    <td>{{ $hmeta->meta_tags }}</td>
                    <td>{{ $hmeta->meta_description }}</td>
                    <td>
                        
                            <!-- Buttons for edit and delete -->
                            <form action="{{ route('edit-home-meta', $hmeta->id) }}" method="GET" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </form>
                            <form action="{{ route('delete-home-meta', $hmeta->id) }}" method="POST" style="display:inline-block;">
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
    <p>No Metas found.</p>
@endif

@endsection
