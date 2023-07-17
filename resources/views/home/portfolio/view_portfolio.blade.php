@extends('home.layout.front')
@section('content')
<div class="content">
    <section>
        <div class="container">
            <!--  portfolio header -->
            <div class="content-logo">
                <img src="/front/images/content-logo.png" alt="">
            </div>
            <div class="separator separator-image"><img  src="front/images/separator2.png"   alt=""></div>
            <h3 class="subtitle" style="color:#000;">Portfolio </h3>
            <!--  portfolio header end-->
            <!-- Filters-->
            <div class="filter-holder inline-filters">
                <div class="gallery-filters">
                    <a href="#" class="gallery-filter gallery-filter-active"  data-filter="*">All Albums</a>
                    
                </div>
            </div>
            <!-- filters end -->
        </div>
        
           
        <div class="gallery-items grid-big-pad vis-port-info">
            <!-- 1 -->
            @foreach($portfolios as $portfolio)
                <div class="gallery-item travel">
                    <div class="grid-item-holder">
                        <div class="box-item">
                            <a href="{{route('view-single-portfolio', $portfolio->id)}}">
                                <span class="overlay"></span>
                                <img src="{{ asset('images/' . json_decode($portfolio->images)[0]) }}" alt="">
                            </a>
                        </div>
                        <div class="grid-item">
                            <h3><a class="ajax portfolio-link">{{ $portfolio->title }}</a></h3>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        
   
    </section>
</div>

@endsection