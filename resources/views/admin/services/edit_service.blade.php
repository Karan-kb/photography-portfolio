@extends('admin.layout.back')
@section('content')

<form method="POST" action="{{route('update-service', $service->id)}}" enctype="multipart/form-data">
    @csrf
    @method('POST') <!-- Add this line to specify the method as POST -->

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="form-group">
        <label for="title">Title</label>
        <input type="title" id="title" name="title" class="form-control" required value="{{ $service->title }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <input type="description" id="description" name="description" class="form-control"  required value="{{ $service->description }}">
    </div>
   
    <div class="div_design">
        <label>Current Service Images:</label>
        @foreach (json_decode($service->images) as $image)
            <img style="margin:auto;" height="100" width="100" src="{{ asset('images/' . $image) }}">
        @endforeach
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image[]" multiple>
            <label class="custom-file-label" for="image">Choose files</label>
            <span id="selected-image"></span>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update Service</button>

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
