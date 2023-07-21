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

<form method="POST" action="{{route('add-link-contact-extra')}}" enctype="multipart/form-data">
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
        <input type="text" id="title" name="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="facebook_url">Facebook</label>
        <input type="text"  id="facebook_url" name="facebook_url" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="instagram_url">Instagram</label>
        <input type="text"  id="instagram_url" name="instagram_url" class="form-control" required>
    </div>

  

    <button type="submit" class="btn btn-primary">Add Contact Link </button>
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
