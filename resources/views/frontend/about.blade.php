@extends('frontend.layouts.main')


@section('main-container')
<div id="banner-area" class="banner-area" style="background-image:url({{url('frontend/images/banner/banner1.jpg')}})">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">About</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">company</a></li>
                      <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
      @if($about-> isNotEmpty())
        @foreach($about as $abt)
            <div class="col-lg-12">
              <h3 class="column-title">{{$abt->title}}</h3>
              <p>{{$abt->description}}</p>
              
            </div><!-- Col end -->
        
			  @endforeach
      @endif
        
    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->


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
@if($about-> isNotEmpty())
<section id="ts-team" class="ts-team">
  <div class="container">
    <div class="row text-center">
        <div class="col-lg-12">
          <h2 class="section-title">Quality Service</h2>
          <h3 class="section-sub-title">Professional Team</h3>
        </div>
    </div><!--/ Title row end -->

    <div class="row">
        <div class="col-lg-12">
          <div id="team-slide" class="team-slide">
            @foreach($teams as $member)
              <div class="item">
                <div class="ts-team-wrapper">
                  @if($member->image == "")
                    <div class="team-img-wrapper">
                      <img loading="lazy" class="w-100" src="https://placehold.co/600x400" alt="team-img">
                    </div>
                  @else
                    <div class="team-img-wrapper">
                      <img loading="lazy" class="w-100" src="{{asset('uploads/team/'.$member->image)}}" alt="team-img">
                    </div>
                  @endif
                    <div class="ts-team-content">
                      <h3 class="ts-name">{{$member->name}}</h3>
                      <p class="ts-designation">{{$member -> position}}</p>
                      <p class="ts-description">{{$member->about}}</p>
                      
                    </div>
                </div><!--/ Team wrapper end -->
              </div><!-- Team 1 end -->

              @endforeach

          </div><!-- Team slide end -->
        </div>
    </div><!--/ Content row end -->
  </div><!--/ Container end -->
</section><!--/ Team end -->
@endif
 @endsection