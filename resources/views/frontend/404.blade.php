@extends('frontend.layouts.main')


@section('main-container')
<div id="banner-area" class="banner-area" style="background-image:url({{url('frontend/images/banner/banner1.jpg')}}">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">404</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="\">Home</a></li>
                      <li class="breadcrumb-item"><a href="#"></a>404</li>
                      <li class="breadcrumb-item active" aria-current="page">404</li>
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

      <div class="col-12">
        <div class="error-page text-center">
          <div class="error-code">
            <h2><strong>404</strong></h2>
          </div>
          <div class="error-message">
            <h3>Oops... Page Not Found!</h3>
          </div>
          <div class="error-body">
            Try using the button below to go to main page of the site <br>
            <a href="index.html" class="btn btn-primary">Back to Home Page</a>
          </div>
        </div>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->
@endsection
