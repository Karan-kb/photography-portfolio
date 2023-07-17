@extends('admin.layout.back')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h5 class="card-title">Change Password</h5>
                    </div>
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('password') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="current-password">Current Password:</label>
                            <input type="password" class="form-control" id="current-password" name="current-password" required>
                            @error('current-password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="new-password">New Password:</label>
                            <input type="password" class="form-control" id="new-password" name="new-password" minlength="8" required>
                            @error('new-password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" minlength="8" required>
                            @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
