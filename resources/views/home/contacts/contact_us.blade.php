@extends('home.layout.front')
@section('meta_tags')
    <!-- Meta tags specific to the About page -->
    @foreach($contactmeta as $contactmeta)
    <meta name="description" content="{{$contactmeta->meta_description}}">
    <meta name="keywords" content="{{$contactmeta->meta_tags}}">
    @endforeach
@endsection
@section('content')
<style>
    .form-group {
      display: flex;
      align-items: center;
    }
  
    .form-group label {
      width: 120px;
      text-align: right;
      margin-right: 10px;
      font-size: 16px; /* Adjust the font size as needed */
    }
  
    .form-group input[type="text"],
    .form-group textarea {
      flex: 1;
      padding: 5px;
      font-size: 16px; /* Match the font size to the label */
    }

    .inline-facts-holder {
    display: flex;
    justify-content: space-between;
}

  </style>
  
<div class="content-holder elem scale-bg2 transition3" >
    <!--  Page title    -->
    <div class="fixed-title"><span>Contacts</span></div>
    <!--  Page title end   -->
    <!--  Page navigation   -->
    <div class="scroll-page-nav">
        <ul>
            <li><a href="#sec1"></a></li>
            <li><a href="#sec2"></a></li>
            <li><a href="#sec3"></a></li>
        </ul>
    </div>
    <!--  Page navigation  end -->
    <div class="content full-height">
        <!--  Page title section   -->
        <section class="parallax-section">
            <div class="overlay"></div>
            @foreach($contact_photo as $contact_photos)
            @foreach(json_decode($contact_photo->images) as $image)
            <div class="bg" style="background-image:url({{ asset('images/' . $image) }})" data-top-bottom="transform: translateY(200px);" data-bottom-top="transform: translateY(-200px);"></div>
            @endforeach
            @endforeach
            <div class="container">
                <h2>Contacts</h2>
                @foreach($contacts as $contact)
                <div class="separator"></div>
                @if($contact_photo)
                <h3 class="subtitle">{{$contact_photo->title}} </h3>
                @endif
                @endforeach
            </div>
            <a class="custom-scroll-link sect-scroll" href="#sec1"><i class="fa fa-angle-double-down"></i></a>
        </section>
        <!--  Page title section end  -->
        <!--  Section contact info   -->
        <section class="section-columns" id="sec1">
            <div class="section-columns-img">
                
                @foreach(json_decode($contact->images) as $image)
                
                <div class="bg" style="background-image:url({{ asset('images/' . $image) }})" ></div>
                @endforeach
            </div>
            <div class="section-columns-text">
                <div class="custom-inner">
                    <div class="container">
                        <h2>Get in Touch</h2>
                        <div class="separator"></div>
                        <div class="clearfix"></div>
                        <h3 class="subtitle">{{$contact->slogan}}</h3>
                        <p>{{$contact->description}}</p>
                        <ul class="contact-list no-dec">
                            <li><span>Address:</span><a href="#">{{$contact->address}}</a></li>
                            <li><span>Phone:</span><a href="#">{{$contact->phone}}</li>
                            <li><span>Email:</span><a href="#">{{$contact->email}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!--  Section contact info end   -->
        <!--  Section social   -->
        {{-- <section class="no-padding">
            <div class="content">
                <div class="inline-facts-holder">
                    @if($contactlink)
                        @foreach($contactlink as $link)
                        <div class="inline-facts">
                            <h6><a href="{{ $link->facebook_url }}">Facebook</a></h6>
                        </div>
                        <div class="inline-facts">
                            <h6><a href="{{ $link->instagram_url }}">Instagram</a></h6>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section> --}}

        <section class="no-padding">
            <div class="content">
                <div class="inline-facts-holder">
                     <section class="no-padding">
            <div class="content">
                <div class="inline-facts-holder">
                    @if ($contactlink && $contactlink->facebook_url)
                    @php
                        $facebook_url =$contactlink->facebook_url;
                        $facebook_url = $facebook_url[0] ?? null;
                    @endphp
                    @if ($facebook_url)
                         <div class="inline-facts">
                                    <h6><a href="{{ $contactlink->facebook_url }}">Facebook</a></h6>
                                </div>
                                <div class="inline-facts">
                                    <h6><a href="{{ $contactlink->instagram_url }}">Instagram</a></h6>
                                </div>
                    @endif
                @endif
                </div>
            </div>
        </section>
                </div>
            </div>
        </section>
        
        
        <!-- social end  -->
        <!--  Section map   -->
        <section class="no-padding" id="sec2">
            <div class="map-box">
                
                <div class="map-box">
                    <div class="map-holder" data-top-bottom="transform: translateY(300px);" data-bottom-top="transform: translateY(-300px);">
                        
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14133.072425783655!2d85.3374398!3d27.6781073!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19f2c8478921%3A0xb87efc56819a29e6!2sKeshab%20Studioz!5e0!3m2!1sen!2snp!4v1690270861204!5m2!1sen!2snp" width="1200" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           

            <div>
            </div>
        </section>
        
        <!--  Section map end  -->
        <!--  Section contact form  -->
        <section class="flat-form" id="sec3">
            <div class="container">
                <h2>Write us</h2>
                <div class="separator-image"><img src="front/images/separator2.png" alt=""></div>
                <div id="contact-form">
                    <div id="message"></div>
                    <form action="{{ route('send-message') }}" method="POST">
                        @csrf
                      
                        <div class="form-group">
                          <label for="name">Name:</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
                        </div>
                      
                        <div class="form-group">
                          <label for="email">Email address:</label>
                          <input type="text" class="form-control" id="email" name="email" placeholder="Your email address" required>
                          <span class="invalid-feedback" id="email-error"></span>
                        </div>
                      
                        <div class="form-group">
                          <label for="comments">Message:</label>
                          <textarea class="form-control" id="comments" name="message" placeholder="Your message" rows="5" required></textarea>
                        </div>
                      
                        <button type="submit" class="btn btn-primary">Send message</button>
                      </form>
                </div>
            </div>
        </section>
        <!--  Section contact form end  -->
    </div>
    <!-- Content end  -->
    <!-- Share container  -->
    <div class="share-container isShare" data-share="['facebook','pinterest','googleplus','twitter','linkedin']"></div>
</div>

@endsection
