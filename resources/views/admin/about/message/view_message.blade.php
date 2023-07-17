@extends('admin.layout.back')
@section('content')

<style>
    /* CSS styles for the table */
    .portfolio-table {
        width: 100%;
        border-collapse: collapse;
    }

    .portfolio-table th,
    .portfolio-table td {
        padding: 10px;
        border: 1px solid #ccc;
    }
</style>

<!-- Your existing form code -->
<form method="POST" action="{{route('view-message')}}" enctype="multipart/form-data">
    <!-- Form fields -->
    <div class="text-center">
        <h2>All Messages</h2>
    </div>
</form>

<!-- Display table if there are portfolios -->
@if($message && count($message) > 0)
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="portfolio-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
              

                
            </tr>
        </thead>
        <tbody>
            @foreach($message as $message)
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->message }}</td>
                    
                   
            
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No Message found.</p>
@endif

@endsection
