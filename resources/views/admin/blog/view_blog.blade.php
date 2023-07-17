@extends('admin.layout.back')
@section('content')

<form action="" method="POST" enctype="multipart/form-data">
    <div class="text-center">
        <h2>All Blogs</h2>
    </div>
</form>
@if($blogs && count($blogs) > 0)

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<table class="blog-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Summary</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($blogs as $blog)
        <tr>
            <td>{{ $blog->title }}</td>
            <td>{{ $blog->description }}</td>
            <td>{{ $blog->summary }}</td>
            <td>
                @foreach(json_decode($blog->images) as $image)
                <img src="{{ asset('images/' . $image) }}" alt="Blog Image" width="100">
                @endforeach
            </td>
            <td>
                <form action="{{route('edit-blog', $blog->id)}}" method="GET" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>

            <form action="{{route('delete-blog', $blog->id)}}" method="POST" style="display:inline-block;">
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

<p>No blogs found.</p>
@endif
@endsection    