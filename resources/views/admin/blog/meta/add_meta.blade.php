@extends('admin.layout.back')
@section('content')
<style>
    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    .custom-file-label::after {
        content: "Browse";
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0069d9;
    }
</style>

<form action="{{route('add-blogs-meta')}}" method="POST" enctype="multipart/form-data">
    @csrf

    @if($errors->any())
    <div class="alert-alert danger">
        <ul>
            @foreach($error->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="aler alert-success">
        {{ session('success')}}
    </div>
    @endif

    @if(session('error'))
    <div class="aler alert-danger">
        {{session('error')}}

    </div>
    @endif

    

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="meta_tags">Meta Tags</label>
        <textarea id="meta_tags" name="meta_tags" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="meta_description">Meta Description</label>
        <textarea id="meta_description" name="meta_description" class="form-control" required></textarea>
    </div>

   

    <button type="submit" class="btn btn-primary">Add Blog Meta</button> 
</form>

<script>
    $('.custom-file-input').on('change', function(e) {
        var fileName = e.target.files[0].name;
        $(this).next('.custom-file-label').html(fileName);
        $('#selected-image').text(fileName);
    });
</script>
@endsection
