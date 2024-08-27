@extends('frontend.layouts.main')


@section('main-container')
<div id="banner-area" class="banner-area" style="background-image:url({{url('frontend/images/banner/banner1.jpg')}})">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Service</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Services</a></li>
                      <li class="breadcrumb-item active" aria-current="page">All Services</li>
                    </ol>
                </nav>
              </div>
          </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
  </div><!-- Banner text end -->
</div><!-- Banner area end --> 

<section id="main-container" class="main-container pb-2">
  <div class="container">
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
                  <h3 class="service-box-title"><a href="service/{{$service->id}}">{{$service->title}}</a></h3>
                  <p>{{$service->short_description}}</p>
                  <a class="learn-more d-inline-block" href="service/{{$service->id}}" aria-label="service-details"><i class="fa fa-caret-right"></i> Learn more</a>
              </div>
            </div>
        </div><!-- Service1 end -->
      </div><!-- Col 1 end -->

      @endforeach
      @endif

    </div><!-- Main row end -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection