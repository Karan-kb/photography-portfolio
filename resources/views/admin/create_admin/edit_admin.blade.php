@extends('admin.layout.back')
@section('content')

<form method="POST" action="{{route('update-admin',$admin->id)}}" enctype="multipart/form-data">
    @csrf
    @method('POST') <!-- Add this line to specify the method as POST -->

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" required value="{{ $admin->name }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control" required>{{ $admin->description }}</textarea>
    </div>
   
    <div class="form-group">
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" class="form-control" required value="{{ $admin->phone}}">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" name="email" class="form-control" required value="{{ $admin->email }}">
    </div>
    

   



    <button type="submit" class="btn btn-primary">Update Admin</button>

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
