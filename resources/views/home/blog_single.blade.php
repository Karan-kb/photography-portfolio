@extends('home.layout.front')
@section('content')

<div id="wrapper">
    <!--=============== content-holder ===============-->
    <div class="content-holder elem scale-bg2 transition3">
        <div class="fixed-title"><span>Journal</span></div>
        <!--=============== content  ===============-->
        <div class="content">
            <!--section  page title   -->
            <section class="parallax-section">
                <div class="overlay"></div>
                <div class="bg" style="background-image:url({{ asset('images/' . json_decode($blog->images)[0]) }})" data-top-bottom="transform: translateY(200px);" data-bottom-top="transform: translateY(-200px);"></div>
                <div class="container">
                    <h2>Our Journal</h2>
                    <div class="separator"></div>
                    <h3 class="subtitle">Duis lorem urna, porta gravida</h3>
                </div>
                <a class="custom-scroll-link sect-scroll" href="#sec1"><i class="fa fa-angle-double-down"></i></a>
            </section>
            <!--section  page title end  -->
            <div class="sections-bg"></div>
            <section id="sec1">
                <div class="container column-container">
                    <div class="row">
                        <div class="col-md-12"> <!-- Use 'col-md-12' to make it full-width -->
                            <article>
                                <ul class="blog-title">
                                    <li><a href="#" class="tag">{{ $blog->created_at->format('Y-m-d') }}</li>

                               
                                    
                                </ul>
                                <div class="blog-media">
                                    <div class="custom-slider-holder">
                                        <div class="custom-slider owl-carousel">
                                            <div class="item">
                                                <img src="{{ asset('images/' . json_decode($blog->images)[0]) }}" class="respimg" alt="">
                                            </div>
                                            <div class="item">
                                                <img src="{{ asset('images/' . json_decode($blog->images)[0]) }}" class="respimg" alt="">
                                            </div>
                                          
                                        </div>
                                        <div class="customNavigation">
                                            <a class="prev-slide"><i class="fa fa-angle-left"></i></a>
                                            <a class="next-slide"><i class="fa fa-angle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-text">
                                    <h3>{{$blog->title}}</h3>
                                    <p>
                                        {{$blog->summary}}
                                    </p>
                                    <!-- More content here -->
                                    <!-- ... -->
                                </div>
                            </article>
                           
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- Content end  -->
        <!-- Share container  -->

    </div>
    <!-- content holder end -->
</div>
<!-- wrapper end -->
<div class="left-decor"></div>


<!-- footer end -->
</div>
<!-- Main end -->

</html>

@endsection
