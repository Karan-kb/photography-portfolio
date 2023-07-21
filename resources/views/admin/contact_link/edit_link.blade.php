@extends('admin.layout.back')
@section('content')

<form method="POST" action="{{route('update-contact-link', $contactlink->id)}}" enctype="multipart/form-data">
    @csrf
    @method('POST') <!-- Add this line to specify the method as POST -->

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control" required value="{{ $contactlink->title }}">
    </div>

    <div class="form-group">
        <label for="facebook_url">Facebook</label>
        <input type="text" id="facebook_url" name="facebook_url" class="form-control" required value="{{ $contactlink->facebook_url }}">
    </div>

    <div class="form-group">
        <label for="instagram_url">Instagram</label>
        <input type="text" id="instagram_url" name="instagram_url" class="form-control" required value="{{ $contactlink->instagram_url }}">
    </div>

    <button type="submit" class="btn btn-primary">Update Contact Link</button>

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
