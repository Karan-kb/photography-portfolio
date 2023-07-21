@extends('home.layout.front')
@section('content')
<style>

.testimonial-section .passport-size {
  width: 50px !important;
  height: 50px !important;
  border-radius: 50% !important;
  background-size: cover !important;
  background-position: center !important;
  background-repeat: no-repeat !important;
  display: flex !important;
  justify-content: center !important;
  align-items: center !important;
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
                                <div class="num" data-content="{{$about->photos_taken}}" data-num="{{$about->photos_taken}}"></div>
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
                                <div class="num" data-content="{{$about->projects_completed}}" data-num="{{$about->projects_completed}}">0</div>
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
                                <div class="num" data-content="{{$about->cups_of_coffee}}" data-num="{{$about->cups_of_coffee}}">0</div>
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
                                <div class="num" data-content="{{$about->clients_working}}" data-num="{{$about->clients_working}}">0</div>
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
                                    <div class="overlay"></div>
                                    <ul class="team-social">
                                        
                                        
                                    </ul>
                                    @foreach(json_decode($teamMember->images) as $image)
                                        <img src="{{ asset('images/' . $image) }}" alt="" class="respimg">
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
                <div class="bg bg-ser transition" style="background-image:url(front/images/975315.jpg)"></div>
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
                <div class="bg" style="background-image:url(front/images/644208.jpg)" data-top-bottom="transform: translateY(150px);" data-bottom-top="transform: translateY(-150px);"></div>
                <div class="container">
                    <h2>Testimonials</h2>
                    <div class="separator-image"><img src="images/separator.png" alt=""></div>
                    <div class="testimonials-slider-holder">
                        <div class="testimonials-slider owl-carousel">
                            @foreach($testimonial as $testimonial)
                                <div class="item">
                                    <div class="testi-item">
                                        @foreach(json_decode($testimonial->image) as $image)
                                        <div class="testimonial-section">
                                            <div class="passport-size" style="background-image: url('{{ asset('images/' . $image) }}');"></div>
                                        </div>
                                        
                                        @endforeach
                                        <h3>{{$testimonial->name}}</h3>
                                        <p>{{$testimonial->message}}</p>
                                        <a href="#">Via Twitter</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="customNavigation">
                            <a class="next-slide transition"><i class="fa fa-angle-right"></i></a>
                            <a class="prev-slide transition"><i class="fa fa-angle-left"></i></a>
                        </div>
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