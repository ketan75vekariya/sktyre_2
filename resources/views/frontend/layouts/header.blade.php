<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
================================================== -->
  <meta charset="utf-8">
  <title>SK Automotive And Tyres</title>

  <!-- Mobile Specific Metas
================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name=author content="Themefisher">
  <meta name=generator content="Themefisher Constra HTML Template v1.0">

  <!-- Favicon
================================================== -->
  <link rel="icon" type="image/png" href="{{url('frontend/images/favicon.png')}}">

  <!-- CSS
================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{url('frontend/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{url('frontend/plugins/fontawesome/css/all.min.css')}}">
  <!-- Animation -->
  <link rel="stylesheet" href="{{url('frontend/plugins/animate-css/animate.css')}}">
  <!-- slick Carousel -->
  <link rel="stylesheet" href="{{url('frontend/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{url('frontend/plugins/slick/slick-theme.css')}}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{url('frontend/plugins/colorbox/colorbox.css')}}">
  <!-- Template styles-->
  <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">

</head>
<body>
  <div class="body-inner">

    <div id="top-bar" class="top-bar">
    <div class="container">
	          <div class="row">
				@if($companies-> isNotEmpty())
                    @foreach($companies as $company)
						<div class="col-lg-8 col-md-8">
							<ul class="top-info text-center text-md-left">
								<li><i class="fas fa-map-marker-alt"></i> <p class="info-text">{{$company->address}}</p></li>
								<li><i class="fas fa-phone"></i>&#43;<p class="info-text">{{$company->phone}}</p></li>
							</ul>
						</div>
				  	
	              <!--/ Top info end -->
	  
	              <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
	                <ul class="list-unstyled">
						<li>
	                      <a title="Facebook" target=”_blank” href="https://www.facebook.com/profile.php?id=100063772081044">
	                          <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
	                      </a>
	                      <a title="Instagram" target=”_blank” href="https://www.instagram.com/sk_automotive_tyres/">
	                          <span class="social-icon"><i class="fab fa-instagram"></i></span>
	                      </a>
	                    </li>
	                </ul>
	              </div>
				  @endforeach
                @endif
	              <!--/ Top social end -->
	          </div>
	          <!--/ Content row end -->
	        </div>
	        <!--/ Container end -->
	    </div>
        <!--/ Container end -->
    </div>
    <!--/ Topbar end -->
<!-- Header start -->
<header id="header" class="header-one">
<div class="site-navigation" style="background: #161413">
	    <div class="container">
	        <div class="row">
	          <div class="col-lg-12">
	              <nav class="navbar navbar-expand-lg navbar-dark p-0">
	                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
	                    <span class="navbar-toggler-icon"></span>
	                </button>
	                
	                <div id="navbar-collapse" class="collapse navbar-collapse">
                    <div class="logo">
                        <a class="d-block" href="/">
                          <img loading="lazy" src="{{url('frontend/images/logo.jpg')}}" alt="Constra">
                        </a>
                    </div><!-- logo end -->
                    <ul class="nav navbar-nav mr-auto ml-auto">
                      <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link active" href="/">Home</a></li>
                      <li class="nav-item {{ Request::is('about') ? 'active' : '' }}"><a class="nav-link" href="/about">About</a></li>
                      <li class="nav-item {{ Request::is('service') ? 'active' : '' }}"><a class="nav-link" href="/service">Services</a></li>
                      <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}"><a class="nav-link" href="/contact">Contact</a></li>
                    </ul>
						        <div class="header-get-a-quote">
		                   <a class="btn btn-primary" href="/contact">Get An Inquiry</a>
		                </div>
	                </div>
	              </nav>
	          </div>
	          <!--/ Col end -->
	        </div>
	        <!--/ Row end -->
	    </div>
	    <!--/ Container end -->

	  </div>
</header>
<!--/ Header end -->