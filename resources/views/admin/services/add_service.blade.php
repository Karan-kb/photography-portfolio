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

<form method="POST" action="{{route('add-service')}}" enctype="multipart/form-data">

    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif




    <div class="form-group">
        <label for="title">Title</label>
        <input type="title" id="title" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="description" id="description" name="description" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <div class="custom-file">
            <!-- use square brackets in the input name attribute to indicate an array -->
            <input type="file" multiple class="custom-file-input" id="image" name="image[]" required>
            <label class="custom-file-label" for="image">Choose file</label>
            <span id="selected-image"></span>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Add Service</button>
</form>

<script>
    // update the label text of the file input field when a file is selected
   $('.custom-file-input').on('change', function(e) {
         var fileName = e.target.files[0].name;
        $(this).next('.custom-file-label').html(fileName);
        $('#selected-image').text(fileName);
    });
</script>

@endsection
