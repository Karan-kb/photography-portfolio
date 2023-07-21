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
<form method="POST" action="{{ route('view-testimonials') }}" enctype="multipart/form-data">
    <!-- Form fields -->
    <div class="text-center">
        <h2>All Testimonials</h2>
    </div>
</form>

<!-- Display table if there are testimonials -->
@if($testimonials && count($testimonials) > 0)
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="portfolio-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Company</th>
                <th>Message</th>
                <th>Image</th>
                <th>Actions</th> <!-- Add a new column for actions -->
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->company }}</td>
                    <td>{{ $testimonial->message }}</td>
                    <td>
                        @foreach(json_decode($testimonial->image) as $image)
                            <img src="{{ asset('images/' . $image) }}" alt="Portfolio Image" width="100">
                        @endforeach
                    </td>
                    <td>
                        <!-- Buttons for edit and delete -->
                        <form action="{{ route('edit-testimonials', $testimonial->id) }}" method="GET" style="display: inline-block;">

                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Edit
                            </button>
                        </form>
                        <form action="{{ route('delete-testimonial', $testimonial->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this testimonial?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No testimonials found.</p>
@endif

@endsection
