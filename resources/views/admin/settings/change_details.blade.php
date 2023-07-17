@extends('admin.layout.back')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">User Profile</h5>
                    </div>
                   

                    <form action="{{ route('change-details') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (session('success'))
                        <div class="alert alert-success">
                             {{ session('success') }}
                             </div>
                              @endif
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $admin->phone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $admin->email }}" required>
                        </div>

                        {{-- <div class="form-group">
                            <label for="image">Profile Image:</label>
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div> --}}

                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea class="form-control" id="description" name="description" rows="4" cols="50">{{ $admin->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
