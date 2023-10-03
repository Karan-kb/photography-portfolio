@extends('home.layout.front')

@section('meta_tags')
    <!-- Meta tags specific to the About page -->
    @foreach($aboutmeta as $aboutmeta)
    <meta name="description" content="{{$aboutmeta->meta_description}}">
    <meta name="keywords" content="{{$aboutmeta->meta_tags}}">
    @endforeach
@endsection
@section('content')
<style>

.testimonial-section .passport-size {
  width: 10px !important;
  height: 10px !important;
  border-radius: 50% !important;
  background-size: cover !important;
  background-position: center !important;
  background-repeat: no-repeat !important;
  display: flex !important;
  justify-content: center !important;
  align-items: center !important;
}




.testimonial-section {
  position: relative;
  /* Add desired height for the testimonial section */
}

.testimonial-bg {
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
}




    </style>
<div class="content-holder elem scale-bg2 transition3" >
    <!--=============== Content  ===============-->
    <div class="content full-height">
        <!-- Fixed title-->
        <div class="fixed-title"><span>About Us</span></div>
        <!-- Page navigation-->
        <div class="scroll-page-nav">
            <ul>
                <li><a  href="#sec1"></a></li>
                <li><a  href="#sec2"></a></li>
                <li><a  href="#sec3"></a></li>
                <li><a  href="#sec4"></a></li>
                <li><a  href="#sec5"></a></li>
            </ul>
        </div>
        <!-- Page navigation end-->
        <!-- Page title section -->
       
        <section class="parallax-section">
            
            @foreach($about as $about)
           
            <div class="overlay"></div>
           
            @if ($about_photo && $about_photo->images)
            @php
                $images = json_decode($about_photo->images);
                $image = $images[0] ?? null;
            @endphp
            @if ($image)
                <div class="bg" style="background-image: url({{ asset('images/' . $image) }})" data-top-bottom="transform: translateY(200px);" data-bottom-top="transform: translateY(-200px);"></div>
            @endif
        @endif
        
        
        
           
            <div class="container">
                <h2>About us</h2>
                @foreach(json_decode($about->images) as $image)
              <div class="separator-image"><img src="url({{ asset('images/' . $image) }})" alt=""></div>
              @endforeach
              @if ($about_photo && $about_photo->title)
              <h3 class="subtitle">{{ $about_photo->title }}</h3>
          @endif
          
            </div>
            <a class="custom-scroll-link sect-scroll" href="#sec1"><i class="fa fa-angle-double-down"></i></a>
           
           
          </section>
          
          
          
          
        <!-- Page title section end-->
        <!-- About   -->
        <section class="section-columns" id="sec1">
            <div class="section-columns-img">
                
                @foreach(json_decode($about->images) as $image)
                
                <div class="bg" style="background-image:url({{ asset('images/' . $image) }})" ></div>
                @endforeach
               
            </div>
            <div class="section-columns-text">
                <div class="custom-inner">
                    <div class="container">
                        <h2>About Us</h2>
                        <div class="separator"></div>
                        <div class="clearfix"></div>
                        <h3 class="subtitle">{{$about->title}}</h3>
                        <p>{{$about->description}}</p>
                       
                    </div>
                </div>
            </div>
        </section>
        <!-- About end  -->
        <!-- Facts -->
        <section class="no-padding" id="sec2">
            <div class="content">
                <div class="inline-facts-holder">
                    <!-- 1  -->
                    <div class="inline-facts">
                        <i class="fa fa-picture-o "></i>
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="{{$about->photos_taken}}" data-num="{{$about->photos_taken}}">{{$about->photos_taken}}</div>
                            </div>
                        </div>
                        <h6>Photos Taken</h6>
                    </div>
                    <!-- 1  end-->
                    <!-- 2  -->
                    <div class="inline-facts">
                        <i class="fa fa-suitcase "></i>
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="{{$about->projects_completed}}" data-num="{{$about->projects_completed}}">{{$about->projects_completed}}</div>
                            </div>
                        </div>
                        <h6>Projects completed</h6>
                    </div>
                    <!-- 2 end  -->
                    <!-- 3  -->
                    <div class="inline-facts">
                        <i class="fa fa-coffee "></i>
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="{{$about->cups_of_coffee}}" data-num="{{$about->cups_of_coffee}}">{{$about->cups_of_coffee}}</div>
                            </div>
                        </div>
                        <h6>Cups of Coffee</h6>
                    </div>
                    <!-- 3 end  -->
                    <!-- 4  -->
                    <div class="inline-facts">
                        <i class="fa fa-trophy"></i>
                        <div class="milestone-counter">
                            <div class="stats animaper">
                                <div class="num" data-content="{{$about->clients_working}}" data-num="{{$about->clients_working}}">{{$about->clients_working}}</div>
                            </div>
                        </div>
                        <h6>Clients Working</h6>
                    </div>
                    <!-- 4 end  -->
                </div>
            </div>
            @endforeach
        </section>
        <!-- Facts end   -->
        <!-- Team   -->
        <section id="sec3">
            <div class="container">
                <h2>Our Team</h2>
                <div class="separator-image"><img src="images/separator2.png" alt=""></div>
                <ul class="team-holder">
                    @foreach($team as $teamMember)
                        <li>
                            <div class="team-box">
                                <div class="team-photo">
                                  
                                    {{-- <ul class="team-social">
                                        
                                        
                                    </ul> --}}
                                    @foreach(json_decode($teamMember->images) as $image)
                                    
                                       <img class="img img-fluid object-fit-contain" height="240px" width="200px" src="{{ asset('images/' . $image) }}" alt="" > 
                                    
                                    @endforeach
                                </div>
                                <div class="team-info">
                                    <h3>{{ $teamMember->name }}</h3>
                                    <h4>{{ $teamMember->position }}</h4>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                

        </section>
        <!-- Team end   -->
        <!-- services   -->
        <section class="section-columns" id="sec4">
            <div class="section-columns-img">
                @foreach(json_decode($latest_service->images) as $image)
                    <div class="bg bg-ser transition" style="background-image:url({!! asset("images/" . $image) !!})"></div>
                @endforeach
            </div>
            
            <div class="section-columns-text">
                <div class="custom-inner">
                    <div class="container">
                        <h2>Services</h2>
                        <div class="separator"></div>
                        <div class="clearfix"></div>
                        <h3 class="subtitle">Look even slightly believable. If you are going to use a passage.</h3>
                        <ul class="servicses-holder">
                            @foreach($service as $service)
                                <li data-bgscr="images/bg/4.jpg">
                                    <i class="fa fa-map-signs"></i>
                                    <h4>{{ $service->title }}</h4>
                                    <p>{{ $service->description }}</p>
                                  
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- Services end   -->
        <!-- Order  -->
        <section class="no-padding">
            <div class="order-holder">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Ready to order your project ? </h3>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('contact-us')}}" class=" btn anim-button  trans-btn  transition fl-l"><span>Contact us</span><i class="fa fa-envelope-o"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Order end  -->
        <!-- Testimonials   -->
        <div class="testimonial-section">
            <section class="parallax-section small-padding" id="sec5">
                <div class="overlay"></div>
                @if($latest_testi && $latest_testi->image1)
    @foreach(json_decode($latest_testi->image1) as $image1)
        <div class="bg testimonial-bg" style="background-image:url({{ asset('image1/' . $image1) }})" data-top-bottom="transform: translateY(150px);" data-bottom-top="transform: translateY(-150px);"></div>
    @endforeach
@endif

<div class="container">
    <h2>Testimonials</h2>
    <div class="separator-image"><img src="images/separator.png" alt=""></div>
    <div class="testimonials-slider-holder">
        <div class="testimonials-slider owl-carousel">
            @foreach($testimonial as $testimonialItem)
<!-- Slide -->
<div class="item">
    <div class="testi-item">
        <!-- Background Image -->
        {{-- <div class="bg" style="background-image: url({{ asset('path/to/background/image.jpg') }});"></div> --}}
        <!-- Add the testimonial image here -->
        <div class="testimonial-image">
            @foreach(json_decode($testimonialItem->image) as $image)
            <img alt="{{ $testimonialItem->name }}" src="{{ asset('images/' . $image) }}">
            @endforeach
        </div>
        <!-- Testimonial content -->
        <div class="testimonial-content">
            <h3>{{ $testimonialItem->name }}</h3>
            <p>{{ $testimonialItem->message }}</p>
        </div>
    </div>
</div>
<!-- Slide end -->
@endforeach

        </div>
        <!-- Navigation arrows -->
        <div class="customNavigation">
            <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
        </div>
        <!-- Navigation arrows end -->
    </div>
</div>

            </section>
            
    </div>
        <!-- Testimonials end -->
    </div>
    <!-- Content end  -->
    <!-- Share container  -->
    <div class="share-container  isShare"  data-share="['facebook','pinterest','googleplus','twitter','linkedin']"></div>
</div>

@endsection
{{-- <script>
$(document).ready(function() {
    $('.milestone-counter .num').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).attr('data-content')
        }, {
            duration: 3000, // The duration of the counting animation in milliseconds
            easing: 'swing', // The easing function used for the animation
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
});
</script> --}}