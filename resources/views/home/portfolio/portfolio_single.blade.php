@extends('home.layout.front')

@section('content')
<div id="wrapper">
    <!--=============== content-holder ===============-->
    <div class="content-holder elem scale-bg2 transition3">
        <!--page title -->
        <div class="fixed-title"><span>Project Title</span></div>
         <!--page title end -->
          <!--=============== content ===============-->
        <div class="content full-height">
             <!--=============== description column  ===============-->
          
             @foreach($portfolio as $portfolio)
             if (is_a($portfolio, 'App\Models\Portfolio')) {
                 <h3>{{$portfolio->title}}</h3>
             }
         @endforeach
        <!-- content holder end -->
    </div>
@endsection
