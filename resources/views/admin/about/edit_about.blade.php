@extends('admin.layout.back')
@section('content')

<form method="POST" action="{{ route('update-about-details', $about->id) }}" enctype="multipart/form-data">
    @csrf
    @method('POST') <!-- Add this line to specify the method as POST -->

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" class="form-control" required value="{{ $about->title }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control" required>{{ $about->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="photos_taken">Photos Taken</label>
        <input type="text" id="photos_taken" name="photos_taken" class="form-control" required value="{{ $about->photos_taken }}">
    </div>
    <div class="form-group">
        <label for="projects_completed">Projects Completed</label>
        <input type="text" id="projects_completed" name="projects_completed" class="form-control" required value="{{ $about->projects_completed}}">
    </div>
    <div class="form-group">
        <label for="cups_of_coffee">Cups of Coffee</label>
        <input type="text" id="cups_of_coffee" name="cups_of_coffee" class="form-control" required value="{{ $about->cups_of_coffee }}">
    </div>
    <div class="form-group">
        <label for="clients_working">Clients Working</label>
        <input type="text" id="clients_working" name="clients_working" class="form-control" required value="{{ $about->clients_working }}">
    </div>

    <div class="div_design">
        <label>Current About Images:</label>
        @foreach (json_decode($about->images) as $image)
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

    <button type="submit" class="btn btn-primary">Update About</button>

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
