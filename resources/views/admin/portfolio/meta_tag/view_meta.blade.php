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
        <h2>Portfolio Meta</h2>
    </div>
</form>

<!-- Display table if there are portfolios -->
@if(isset($portfoliometa) && count($portfoliometa) > 0)
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
            @foreach($portfoliometa as $pmeta)
                <tr>
                    <td>{{ $pmeta->title }}</td>
                    <td>{{ $pmeta->meta_tags }}</td>
                    <td>{{ $pmeta->meta_description }}</td>
                    <td>
                        
                            <!-- Buttons for edit and delete -->
                            <form action="{{ route('edit-portfolio-meta', $pmeta->id) }}" method="GET" style="display: inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </form>
                            <form action="{{ route('delete-portfolio-meta', $pmeta->id) }}" method="POST" style="display:inline-block;">
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
