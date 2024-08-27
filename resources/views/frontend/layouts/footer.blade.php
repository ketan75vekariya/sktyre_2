<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-4 col-md-6 footer-widget footer-about">
            <h3 class="widget-title">SK Automotive And Tyres </h3>
            <img loading="lazy" width="200px" class="footer-logo" src="{{url('frontend/images/logo.jpg')}}" alt="Constra">
            <p>Expert Car Care You Can Trust</p>
            <div class="footer-social">
              <ul>
                <li><a href="https://www.facebook.com/profile.php?id=100063772081044" aria-label="Facebook"><i
                      class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://www.instagram.com/sk_automotive_tyres/" aria-label="Instagram"><i
                      class="fab fa-instagram"></i></a></li>
                
              </ul>
            </div><!-- Footer social end -->
          </div><!-- Col end -->

          <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
            <h3 class="widget-title">Working Hours</h3>
            <div class="working-hours">
              We work 6 days a week, Contact us if you have an emergency, with our
              Hotline and Contact form.
              <br><br> Monday - Friday: <span class="text-right">07:30 - 18:00 </span>
              <br> Saturday: <span class="text-right">07:00 - 16:00</span>
              <br> Sunday : <span class="text-right">Closed</span>
            </div>
          </div><!-- Col end -->

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
            <h3 class="widget-title">Services</h3>
            <ul class="list-arrow">
              @if($services-> isNotEmpty())
                 @foreach($services as $service)
              <li><a href="service/{{$service->id}}">{{$service->title}}</a></li>
              @endforeach
              @endif
            </ul>
          </div><!-- Col end -->
        </div><!-- Row end -->
      </div><!-- Container end -->
    </div><!-- Footer main end -->

    <div class="copyright">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="copyright-info">
              <span>Copyright &copy; <script>
                  document.write(new Date().getFullYear())
                </script>, Designed by <a href="https://themefisher.com">Themefisher</a></span>
            </div>
          </div>

          <div class="col-md-6">
            <div class="footer-menu text-center text-md-right">
              <ul class="list-unstyled footer-list">
                <li><a href="/home">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/service">Service</a></li>
                <li><a href="/contact">Contact</a></li>
              </ul>
            </div>
          </div>
        </div><!-- Row end -->

        <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
          <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
          </button>
        </div>

      </div><!-- Container end -->
    </div><!-- Copyright end -->
  </footer><!-- Footer end -->


  <!-- Javascript Files
  ================================================== -->

  <!-- initialize jQuery Library -->
  <script src="{{url('frontend/plugins/jQuery/jquery.min.js')}}"></script>
  <!-- Bootstrap jQuery -->
  <script src="{{url('frontend/plugins/bootstrap/bootstrap.min.js')}}" defer></script>
  <!-- Slick Carousel -->
  <script src="{{url('frontend/plugins/slick/slick.min.js')}}"></script>
  <script src="{{url('frontend/plugins/slick/slick-animation.min.js')}}"></script>
  <!-- Color box -->
  <script src="{{url('frontend/plugins/colorbox/jquery.colorbox.js')}}"></script>
  <!-- shuffle -->
  <script src="{{url('frontend/plugins/shuffle/shuffle.min.js')}}" defer></script>


  <!-- Google Map API Key-->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
  <!-- Google Map Plugin-->
  <script src="{{url('frontend/plugins/google-map/map.js')}}" defer></script>

  <!-- Template custom -->
  <script src="{{url('frontend/js/script.js')}}"></script>

  </div><!-- Body inner end -->
  </body>

  </html>