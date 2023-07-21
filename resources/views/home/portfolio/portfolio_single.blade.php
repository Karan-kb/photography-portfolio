@extends('home.layout.front')

@section('content')
    <!-- header end -->
    <!--=============== wrapper ===============-->
    <div id="wrapper">
        <!--=============== content-holder ===============-->
        <div class="content-holder elem scale-bg2 transition3">
            <!-- page title -->
            <div class="fixed-title"><span>Portfolio</span></div>
            <!-- page title end -->
            <!--=============== content ===============-->
            <div class="content full-height">
                <!--=============== description column  ===============-->
                <div class="fixed-info-container">
                    @if ($portfolio)
                       
                            <h3>{{ $portfolio->title }}</h3>
                            <div class="separator"></div>
                            <div class="clearfix"></div>
                            <p>{{$portfolio->description}}</p>
                            <h4>Info</h4>

                            <a href="#" class=" btn anim-button   trans-btn   transition  fl-l"
                                target="_blank"><span>View Project</span><i class="fa fa-eye"></i></a>
                            <div class="content-nav">
                                <ul>
                                    <li><a href="portfolio-single2.html"><i class="fa fa-long-arrow-left"></i></a></li>
                                    <li><span>/</span></li>
                                    <li><a href="portfolio-single3.html"><i class="fa fa-long-arrow-right"></i></a></li>
                                </ul>
                                
                            </div>
                      
                    
                </div>
                <div class="resize-carousel-holder vis-info">
                    <div id="gallery_horizontal" class="gallery_horizontal owl_carousel demo-gallery">
                        <!-- gallery Item-->

                        <!-- gallery item end-->
                        <!-- gallery Item-->

                        @if (is_array($portfolio->images) && count($portfolio->images) > 0)
                            @foreach ($portfolio->images as $image)
                                <div class="horizontal_item">
                                    <div class="zoomimage">
                                        <img src="{{ asset('images/' . $image) }}" class="intense" alt="">
                                        <i class="fa fa-expand"></i>
                                    </div>
                                    <img src="{{ asset('images/' . $image) }}" alt="">
                                    <div class="show-info">
                                        <div class="tooltip-info">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="horizontal_item">
                                <div class="zoomimage">
                                    @if($portfolio)
                                    <img src="{{ asset('images/' . json_decode($portfolio->images)[0]) }}" class="intense" alt="">
                                    @endif
                                    <i class="fa fa-expand"></i>
                                </div>
                                <img src="{{ asset('images/' . json_decode($portfolio->images)[0]) }}" alt="">
                                <div class="show-info">
                                    <div class="tooltip-info">
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!--  navigation -->
                        <div class="customNavigation">
                            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                            <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                        </div>
                        <!--  navigation end-->
                    </div>
                    <!-- portfolio  Images  end-->
                </div>
                <!-- Content end  -->
                <!-- Share container  -->
            </div>
            <!-- content holder end -->
        </div>
        <!-- wrapper end -->
    </div>
    @else

    <p>No portfolio items found.</p>

    @endif
    <!--=============== Footer ===============-->
@endsection
