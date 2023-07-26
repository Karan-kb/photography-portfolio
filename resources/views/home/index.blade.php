@extends('home.layout.front')

@section('meta_tags')
    <!-- Meta tags specific to the About page -->
	@foreach($homemeta as $homemeta)
    <meta name="description" content="{{$homemeta->meta_description}}">
    <meta name="keywords" content="{{$homemeta->meta_tags}}">
	@endforeach
@endsection

@section('content')
<div id="wrapper">
	<!--=============== Content holder  ===============-->
	<div class="content-holder elem scale-bg2 transition3 slid-hol" >
		<!-- Fixed title  -->
		<div class="fixed-title"><span>Home</span></div>
		<!-- Fixed title end -->
		<!--=============== Content ===============-->
		<div class="content full-height">
			<!-- full-height-wrap end  -->
			<div class="full-height-wrap">
				<div class="swiper-container" id="horizontal-slider" data-mwc="1" data-mwa="0">
					<div class="swiper-wrapper">

						@foreach($home as $home)
							
							@foreach(json_decode($home->images) as $image)
							<div class="swiper-slide">
								<div class="bg" style="background-image: url({{ asset('images/' . $image) }})"></div>

								<div class="overlay"></div>
								<div class="zoomimage"><img src="{{ asset('images/' . $image) }}" class="intense" alt=""><i class="fa fa-expand"></i></div>
								<div class="slide-title-holder">
									<div class="slide-title">
										<span class="subtitle"></span>
										<div class="separator-image"><img src="front/images/separator.png" alt=""></div>
										<h3 class="transition">  <a href="portfolio-single.html">{{$home->title}} </a></h3>
										
									</div>
								</div>
							</div>
						@endforeach
						@endforeach

					</div>
				</div>
				<!-- slider  pagination -->
				<div class="pagination"></div>
				<!-- pagination  end -->
				<!-- slider navigation  -->
				<div class="swiper-nav-holder hor hs">
					<a class="swiper-nav arrow-left transition " href="#"><i class="fa fa-angle-left"></i></a>
					<a class="swiper-nav  arrow-right transition" href="#"><i class="fa fa-angle-right"></i></a>
				</div>
				<!-- slider navigation  end -->
			</div>
			<!-- full-height-wrap end  -->
		</div>
		<!-- Content end  -->
		<!-- Share container  -->
		
	<!-- content holder end -->
</div>

@endsection
