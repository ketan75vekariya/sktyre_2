@extends('frontend.layouts.main')


@section('main-container')
<div id="banner-area" class="banner-area" style="background-image:url({{url('frontend/images/banner/banner1.jpg')}}">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Service</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="/">Home</a></li>
                      <li class="breadcrumb-item"><a href="/service">Services</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Service Single</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container">
  <div class="container">
    <div class="row">

      <div class="col-xl-12 col-lg-12">
        <div class="content-inner-page">
          <h2 class="column-title mrt-0">{{$service->title}}</h2>

          

          <div class="gap-40"></div>

              <img loading="lazy" class="img-fluid" style="width: 100%; height: 400px" src="{{asset('uploads/service/'.$service->image)}}" alt="{{$service->title}}" />

          <div class="gap-40"></div>

          <div class="row">
            <div class="col-md-12">

              <p>{{$service->main_description}}</p>
            </div>
            
          </div>
          <!--2nd row end -->

          <div class="gap-40"></div>

          <div class="call-to-action classic">
            <div class="row align-items-center">
              <div class="col-md-8 text-center text-md-left">
                <div class="call-to-action-text">
                  <h3 class="action-title">Interested with this service.</h3>
                </div>
              </div><!-- Col end -->
              <div class="col-md-4 text-center text-md-right mt-3 mt-md-0">
                <div class="call-to-action-btn">
                  <a class="btn btn-primary" href="/contact">Contact Us</a>
                </div>
              </div><!-- col end -->
            </div><!-- row end -->
          </div><!-- Action end -->

        </div><!-- Content inner end -->
      </div><!-- Content Col end -->


    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection