@extends('admin.layout.back')
@section('content')

<form method="POST" action="{{route('update-home-meta',$homemeta->id)}}" enctype="multipart/form-data">
    @csrf
    @method('POST') <!-- Add this line to specify the method as POST -->

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control" required value="{{ $homemeta->title }}">
    </div>
    <div class="form-group">
        <label for="meta_tags">Meta Tags</label>
        <textarea id="meta_tags" name="meta_tags" class="form-control" required>{{ $homemeta->meta_tags }}</textarea>
    </div>
    

    <div class="form-group">
        <label for="meta_description">Meta Description</label>
        <textarea id="meta_description" name="meta_description" class="form-control" required>{{ $homemeta->meta_description }}</textarea>
    </div>
    


    <button type="submit" class="btn btn-primary">Update Meta</button>

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
