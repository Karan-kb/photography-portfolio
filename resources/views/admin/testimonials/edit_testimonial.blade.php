@extends('admin.layout.back')
@section('content')

<form method="POST" action="{{ route('update-testimonial', $testimonial->id) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" required value="{{ $testimonial->name }}">
    </div>

    <div class="form-group">
        <label for="company">Company</label>
        <input type="text" id="company" name="company" class="form-control" value="{{ $testimonial->company }}">
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea id="message" name="message" class="form-control">{{ $testimonial->message }}</textarea>
    </div>

    <div class="div_design">
        <label>Current Testimonials Images:</label>
        @if($testimonial->image)
            @foreach (json_decode($testimonial->image) as $image)
                <img style="margin:auto;" height="100" width="100" src="{{ asset('images/' . $image) }}">
            @endforeach
        @endif
    </div>

    <div class="form-group">
        <label for="image">Image</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image[]" multiple>
            <label class="custom-file-label" for="image">Choose files</label>
            <span id="selected-image"></span>
        </div>
    </div>

    
    <div class="div_design">
        <label>Current Second Testimonials Images:</label>
        @if($testimonial->image1)
            @foreach (json_decode($testimonial->image1) as $image1)
                <img style="margin:auto;" height="100" width="100" src="{{ asset('image1/' . $image1) }}">
            @endforeach
        @endif
    </div>

    <div class="form-group">
        <label for="image1">Second Image</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="image1" name="image1[]" multiple>
            <label class="custom-file-label" for="image1">Choose files</label>
            <span id="selected-image"></span>
        </div>
    </div>
    


    <button type="submit" class="btn btn-primary">Update Testimonial</button>

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
