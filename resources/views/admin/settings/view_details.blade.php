@extends('admin.layout.back')

@section('content')
    <div class="container">
        <h2>Admin Details</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" class="form-control" value="{{$admin->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" class="form-control" value="{{$admin->email}}" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" class="form-control" value="{{$admin->phone}}" readonly>
                </div>

                <div class="form-group">
                    <label for="descriptoin">Description:</label>
                    <input type="description" id="description" class="form-control" value="{{$admin->description}}" readonly>
                </div>

             
            </div>
            
        </div>
        <a href="{{ route('admin-details') }}" class="btn btn-primary">Edit Admin Details</a>

    </div>
@endsection