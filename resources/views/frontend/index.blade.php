@extends('frontend.layouts.main')


@section('main-container')
<div class="banner-carousel banner-carousel-1 mb-0">
  <div class="banner-carousel-item" style="background-image:url({{url('frontend/images/slider-main/bg1.jpg')}})">
    <div class="slider-content">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12 text-center">
                <h2 class="slide-title" data-animation-in="slideInLeft">We are excellence in Car and Tyres</h2>
                <h3 class="slide-sub-title" data-animation-in="slideInRight">Expert Car Care You Can Trust</h3>
                <p data-animation-in="slideInLeft" data-duration-in="1.2">
                    <a href="/service" class="slider btn btn-primary">Our Services</a>
                    <a href="/contact" class="slider btn btn-primary border">Contact Now</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class="banner-carousel-item" style="background-image:url({{url('frontend/images/slider-main/bg2.jpg')}})">
    <div class="slider-content text-left">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="slide-title-box" data-animation-in="slideInDown">Safety Matters</h2>
                <h3 class="slide-sub-title" data-animation-in="slideInLeft">Your Safety is Our Priority</h3>
                <p data-animation-in="slideInRight">
                    <a href="/service" class="slider btn btn-primary border">Our Services</a>
                </p>
              </div>
          </div>
        </div>
    </div>
  </div>

  <div class="banner-carousel-item" style="background-image:url({{url('frontend/images/slider-main/bg3.jpg')}})">
    <div class="slider-content text-right">
        <div class="container h-100">
          <div class="row align-items-center h-100">
              <div class="col-md-12">
                <h2 class="slide-title" data-animation-in="slideInDown">Meet Our Machenics</h2>
                <h3 class="slide-sub-title" data-animation-in="fadeIn">Guaranteed Quality and Satisfaction</h3>
                <div data-animation-in="slideInLeft">
                    <a href="/contact" class="slider btn btn-primary" aria-label="contact-with-us">Contact Us</a>
                    <a href="/about" class="slider btn btn-primary border" aria-label="learn-more-about-us">Learn more</a>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</div>

<section class="call-to-action-box no-padding">
  <div class="container">
    <div class="action-style-box">
        <div class="row align-items-center">
          <div class="col-md-8 text-center text-md-left">
              <div class="call-to-action-text">
                <h3 class="action-title">Your Trusted Car Repair Centre in Sydney</h3>
              </div>
          </div><!-- Col end -->
          <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
              <div class="call-to-action-btn">
                <a class="btn btn-dark" href="/contact">Contact Us</a>
              </div>
          </div><!-- col end -->
        </div><!-- row end -->
    </div><!-- Action style box -->
  </div><!-- Container end -->
</section><!-- Action end -->

<section id="ts-features" class="ts-features pb-0">
  <div class="container">
    <div class="row">
        <div class="col-lg-6">
          <div class="ts-intro">
            @if($about-> isNotEmpty())
              @foreach($about as $abt)
                <h2 class="into-title">{{$abt->title}}</h2>
                <h3 class="into-sub-title">Welcome to SK Automotive and Tyres</h3>
                <p>{{Str::limit($abt->description,1000)}}</p>
                <a href="/about" class="learn-more d-inline-block"><i class="fa fa-caret-right"></i> Read more</a>
              @endforeach
            @endif
          </div><!-- Intro box end -->

          <div class="gap-20"></div>

          
        </div><!-- Col end -->

        <div class="col-lg-6 mt-4 mt-lg-0">
			<div class="text-center">
			         <img loading="lazy" class="img-fluid" src="{{url('frontend/images/services/service-center.png')}}" alt="service-avater-image">
			</div><!-- Col end -->
          <!--/ Accordion end -->

        </div><!-- Col end -->
    </div><!-- Row end -->
  </div><!-- Container end -->
</section><!-- Feature are end -->

<section id="facts" class="facts-area dark-bg">
  <div class="container">
    <div class="facts-wrapper">
        <div class="row">
          <div class="col-md-3 col-sm-6 ts-facts">
            <div class="ts-facts-img">
              <span class="ts-service-icon">
                <i class="fas fa-trophy"></i>
              </span>
            </div>
            <div class="ts-facts-content">
              <h3 class="ts-facts-title mt-2">Guaranteed Parts and Services</h3>
            </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
            <div class="ts-facts-img">
              <span class="ts-service-icon">
                <i class="fas fa-sliders-h"></i>
              </span>
            </div>
            <div class="ts-facts-content">
              <h3 class="ts-facts-title mt-2">Customer Satisfaction</h3>
            </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
            <div class="ts-facts-img">
              <span class="ts-service-icon">
                <i class="fas fa-thumbs-up"></i>
              </span>
            </div>
            <div class="ts-facts-content">
              <h3 class="ts-facts-title mt-2">Guided by Commitment</h3>
            </div>
          </div><!-- Col end -->

          <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
              <div class="ts-facts-img">
                <span class="ts-service-icon">
                  <i class="fas fa-users"></i>
                </span>
              </div>
              <div class="ts-facts-content">
                <h3 class="ts-facts-title mt-2">COMMITTED TO CUSTOMER SATISFACTION</h3>
              </div>
          </div><!-- Col end -->

        </div> <!-- Facts end -->
    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Facts end -->

<section id="ts-service-area" class="ts-service-area pb-0">
  <div class="container">
    <div class="row text-center">
        <div class="col-12">
          <h2 class="section-title">We Are Specialists In</h2>
          <h3 class="section-sub-title">What We Do</h3>
        </div>
    </div>
    <!--/ Title row end -->

     <div class="row">
      @if($services-> isNotEmpty())
        @foreach($services as $service)
        <div class="col-lg-4 col-md-6 mb-5">
          <div class="ts-service-box">
              <div class="ts-service-image-wrapper">
                <img loading="lazy" class="w-100 service-thumbnail" src="{{asset('uploads/service/'.$service->image)}}" alt="{{$service->title}}">
              </div>
              <div class="d-flex">
                <div class="ts-service-info">
                    <h3 class="service-box-title"><a href="/service/{{$service->id}}">{{$service->title}}</a></h3>
                    <p>{{$service->short_description}}</p>
                    <a class="learn-more d-inline-block" href="service/{{$service->id}}" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
                </div>
              </div>
          </div><!-- Service1 end -->
        </div><!-- Col 1 end -->
        @endforeach
      @endif
      </div><!-- Main row end -->

  </div>
  <!--/ Container end -->
</section><!-- Service end -->


<section class="subscribe no-padding">
  <div class="container">
    <div class="row">
      @if($companies-> isNotEmpty())
                    @foreach($companies as $company)
        <div class="col-lg-4">
          <div class="subscribe-call-to-acton">
              <h3>Can We Help?</h3>
              <h4>&#43;{{$company->phone}}</h4>
          </div>
        </div><!-- Col end -->

        <div class="col-lg-8">
          <div class="ts-newsletter row align-items-center">
              <div class="col-md-5 newsletter-introtext">
                <h4 class="text-white mb-0">Email</h4>
                <p class="text-white"><i class="fas fa-envelope"></i>  {{$company->email}}</p>
              </div>
              <div class="col-md-7 ">
                      <div class="header-get-a-quote">
                        <a class="btn btn-primary" href="/contact">Get An Inquiry</a>
                     </div>
              </div>
          </div><!-- Newsletter end -->
        </div><!-- Col end -->

        @endforeach
        @endif
    </div><!-- Content row end -->
  </div>
  <!--/ Container end -->
</section>
<!--/ subscribe end -->
<section class="content">
  <div class="container">
    <div class="row">
        <div class="col-lg-12">
          <h3 class="column-title">Testimonials</h3>
         
          
          <div id="testimonial-slide" class="testimonial-slide">
            @if($testimonials != "")
            @foreach($testimonials as $testimonial)
              <div class="item">
                <div class="quote-item">
                    <span class="quote-text">
                     {{$testimonial->testimonial}}
                    </span>

                    <div class="quote-item-footer d-flex justify-content-center">
                      @if ($testimonial->image == "")
                        <img loading="lazy" class="testimonial-thumb" src="https://placehold.co/50" alt="testimonial">
                      @else
                        <img loading="lazy" class="testimonial-thumb" src="{{asset('uploads/testimonial/'.$testimonial->image)}}" alt="testimonial">  
                      @endif
                      <div class="quote-item-info">
                          <h3 class="quote-author">{{$testimonial->client_name}}</h3>
                      </div>
                    </div>
                </div><!-- Quote item end -->
              </div>
              @endforeach
              @endif
              <!--/ Item 1 end -->
            </div>
          <!--/ Testimonial carousel end-->
        </div><!-- Col end -->

        

    </div>
    <!--/ Content row end -->
  </div>
  <!--/ Container end -->
</section><!-- Content end -->

@endsection

  