@extends('admin.layout.back')
@section('content')

<form method="POST" action="{{route('update-team', $team->id)}}" enctype="multipart/form-data">
    @csrf
    @method('POST') <!-- Add this line to specify the method as POST -->

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="form-group">
        <label for="name">Name</label>
        <input type="name" id="name" name="name" class="form-control" required value="{{ $team->name }}">
    </div>

    <div class="form-group">
        <label for="position">Position</label>
        <input type="position" id="position" name="position" class="form-control"  required value="{{ $team->position }}">
    </div>

    <div class="div_design">
        <label>Current Team Images:</label>
        @foreach (json_decode($team->images) as $image)
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

    <button type="submit" class="btn btn-primary">Update Team</button>

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
