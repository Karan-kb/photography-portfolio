@extends('home.layout.front')
@section('content')
<div class="content-holder elem scale-bg2 transition3">
    <div class="fixed-title"><span>Journal</span></div>
    <!--=============== content  ===============-->
    <div class="content">
        <!--section  page title   -->
        <section class="parallax-section">
            <div class="overlay"></div>
            <div class="bg" style="background-image:url(front/images/bg/22.jpg)" data-top-bottom="transform: translateY(200px);" data-bottom-top="transform: translateY(-200px);"></div>
            <div class="container">
                <h2>Our Journal</h2>
                <div class="separator"></div>
                <h3 class="subtitle">Duis lorem urna, porta gravida</h3>
            </div>
            <a class="custom-scroll-link sect-scroll" href="#sec1"><i class="fa fa-angle-double-down"></i></a>
        </section>
        <!--section  page title end  -->
        <div class="sections-bg"></div>
        <!--section    -->
        <section id="sec1">
            <div class="container column-container">
                <!--================= articles   ================-->
                <div class="row">
                    <div class="col-md-7">
                        <!-- 1 -->
                        <article>
                            @foreach($blog as $blogPost)
                            <ul class="blog-title">
                                <li><a href="#" class="tag">{{$blogPost->created_at}}</a></li>
                                <li> - </li>
                                <li><a href="#" class="tag"> </a></li>
                            </ul>
                            <div class="blog-media">
                                <div class="box-item">
                                    <a href="{{route('view-single-blog', $blogPost->id)}}">
                                        <span class="overlay"></span>
                                        <img src="{{ asset('images/' . json_decode($blogPost->images)[0]) }}" alt="" class="respimg">
                                    </a>
                                </div>
                            </div>
                            <div class="blog-text">
                                <h3>{{$blogPost->title}}</h3>
                                <p>
                                    {{$blogPost->summary}}
                                </p>
                                <a href="{{route('view-single-blog', $blogPost->id)}}" class="ajax btn"><span>read more </span> <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                            @endforeach
                        </article>
                   

                        <!-- pagination -->
                        <div class="pagination-blog">
                            <ul class="pagination">
                                <!-- Previous Page Link -->
                                @if ($blog->onFirstPage())
                                    <li class="disabled"><span>&laquo;</span></li>
                                @else
                                    <li><a href="{{ $blog->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                @endif

                                <!-- Page Link Numbers -->
                                @if ($blog->currentPage() > 3)
                                    <li><a href="{{ $blog->url(1) }}">1</a></li>
                                    @if ($blog->currentPage() > 4)
                                        <li><span>...</span></li>
                                    @endif
                                @endif

                                @foreach(range(1, $blog->lastPage()) as $page)
                                    @if ($page >= $blog->currentPage() - 2 && $page <= $blog->currentPage() + 2)
                                        @if ($page == $blog->currentPage())
                                            <li class="active"><span>{{ $page }}</span></li>
                                        @else
                                            <li><a href="{{ $blog->url($page) }}">{{ $page }}</a></li>
                                        @endif
                                    @endif
                                @endforeach

                                @if ($blog->currentPage() < $blog->lastPage() - 2)
                                    @if ($blog->currentPage() < $blog->lastPage() - 3)
                                        <li><span>...</span></li>
                                    @endif
                                    <li><a href="{{ $blog->url($blog->lastPage()) }}">{{ $blog->lastPage() }}</a></li>
                                @endif

                                <!-- Next Page Link -->
                                @if ($blog->hasMorePages())
                                    <li><a href="{{ $blog->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                @else
                                    <li class="disabled"><span>&raquo;</span></li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    <!--================= sidebar  ================-->
                    <div class="col-md-4">
                        <div class="sidebar">
                            <!-- widget -->
                            <div class="widget">
                                <h3>About Author</h3>
                                @foreach($about_author as $about_author)
                                <div class="clearfix"></div>
                                @foreach(json_decode($about_author->image) as $image)
                                <img src="{{ asset('images/' . $image) }}" class="respimg waimg" alt="">
                                @endforeach
                                <p>{{$about_author->description}}</p>
                            </div>
                            @endforeach
                            <!-- widget -->
                         
                            
                            
                           <!-- widget -->
<!-- widget -->
{{-- <div class="widget">
    <h3>Last posts</h3>
    <ul class="widget-posts">
        @foreach($last_blog as $blogPost)
        <li class="clearfix">
            <ul class="blog-title">
                <li><a href="#" class="tag">{{ $blogPost->created_at }}</a></li>
                <li> - </li>
                <li><a href="#" class="tag"> </a></li>
            </ul>
            <div class="blog-media">
                <div class="box-item">
                    <a href="blog-single.html">
                        <span class="overlay"></span>
                        <img src="{{ asset('images/' . json_decode($blogPost->images)[0]) }}" alt="" class="respimg">
                    </a>
                </div>
            </div>
            <div class="blog-text">
                <h3>{{ $blogPost->title }}</h3>
                <p>{{ $blogPost->summary }}</p>
                <a href="blog-single.html" class="ajax btn"><span>read more </span><i class="fa fa-long-arrow-right"></i></a>
            </div>
        </li>
        @endforeach
    </ul>
</div> --}}

<!-- widget -->

                            
                            
                            <!-- widget -->
                            <div class="widget">
                                <h3>Tags</h3>
                                <div class="clearfix"></div>
                                <ul class="tagcloud">
                                    <li><a href='#' class="transition link">Portfolio</a></li>
                                    <li><a href='#' class="transition link">Tag</a></li>
                                    <li><a href='#' class="transition link">Demo</a></li>
                                    <li><a href='#' class="transition link">Blog</a></li>
                                    <li><a href='#' class="transition link">Photography</a></li>
                                    <li><a href='#' class="transition link">Web design</a></li>
                                </ul>
                            </div>
                            <!-- widget -->
                        </div>
                    </div>
                    <!-- end sidebar -->
                </div>
            </div>
        </section>
    </div>
@endsection
