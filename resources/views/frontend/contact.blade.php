@extends('frontend.layouts.main')


@section('main-container')
<div id="banner-area" class="banner-area" style="background-image:url({{url('frontend/images/banner/banner1.jpg')}})">
  <div class="banner-text">
    <div class="container">
        <div class="row">
          <div class="col-lg-12">
              <div class="banner-heading">
                <h1 class="banner-title">Contact</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Company</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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

    <div class="row text-center">
      <div class="col-12">
        <h2 class="section-title">Reaching our Office</h2>
        <h3 class="section-sub-title">Find Our Location</h3>
      </div>
    </div>
    <!--/ Title row end -->
    @if($companies-> isNotEmpty())
                    @foreach($companies as $company)
    <div class="row">
      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fas fa-map-marker-alt mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Visit Our Office</h4>
            <p>{{$company->address}}</p>
          </div>
        </div>
      </div><!-- Col 1 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-envelope mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Email Us</h4>
            <p>{{$company->email}}</p>
          </div>
        </div>
      </div><!-- Col 2 end -->

      <div class="col-md-4">
        <div class="ts-service-box-bg text-center h-100">
          <span class="ts-service-icon icon-round">
            <i class="fa fa-phone-square mr-0"></i>
          </span>
          <div class="ts-service-box-content">
            <h4>Call Us</h4>
            <p>&#43;{{$company->phone}}</p>
          </div>
        </div>
      </div><!-- Col 3 end -->

    </div><!-- 1st row end -->
    @endforeach
          @endif

    <div class="gap-60"></div>

    <div class="map-responsive">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3316.9978354095274!2d150.9136763!3d-33.7607218!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b1298e362171035%3A0x405fafc2b35331b7!2s66%20Sunnyholt%20Rd%2C%20Blacktown%20NSW%202148%2C%20Australia!5e0!3m2!1sen!2suk!4v1724320280689!5m2!1sen!2suk" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="gap-40"></div>

    <div class="row">
      <div class="col-md-12">
        <h3 class="column-title">We love to hear</h3>
        <!-- contact form works with formspree.io  -->
        <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
        @if(Session::has('success'))
            <div class="alert alert-success mt-5" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <form id="contact-form" action="{{route('contact.store')}}" method="POST" role="form">
          @csrf
          <div class="error-container"></div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Name</label>
                <input class="form-control form-control-name @error('name') is-invalid @enderror" value="{{old('name')}}" name="name" id="name" placeholder="Enter your name" type="text" required>
                <span id = "name" style="color:red"> </span>
                  @error('name')
                      <p class="invalid-feedback">{{$message}}</p>
                  @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email</label>
                <input class="form-control form-control-email @error('email') is-invalid @enderror" value="{{old('email')}}" name="email" id="email" placeholder="Enter your email address" type="email"
                  required>
                  <span id = "email" style="color:red"> </span>
                    @error('email')
                        <p class="invalid-feedback">{{$message}}</p>
                    @enderror
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Phone</label>
                <input class="form-control form-control-subject @error('text') is-invalid @enderror" value="{{old('phone')}}" name="phone" id="phone" placeholder="Enter your phone number" required>
                <span id = "email" style="color:red"> </span>
                  @error('email')
                      <p class="invalid-feedback">{{$message}}</p>
                  @enderror
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Subject</label>
              <input class="form-control form-control-subject @error('subject') is-invalid @enderror" value="{{old('subject')}}" name="subject" id="subject" placeholder="Enter subject" required>
              <span id = "subject" style="color:red"> </span>
                @error('subject')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea class="form-control form-control-message @error('message') is-invalid @enderror" name="message" id="message" placeholder="Enter your message" rows="10"
              required>{{old('message')}}</textarea>
              <span id = "message" style="color:red"> </span>
                @error('message')
                    <p class="invalid-feedback">{{$message}}</p>
                @enderror
          </div>
          <div class="text-right"><br>
            <button class="btn btn-primary solid blank" type="submit">Send Message</button>
          </div>
        </form>
      </div>

    </div><!-- Content row -->
  </div><!-- Conatiner end -->
</section><!-- Main container end -->

@endsection