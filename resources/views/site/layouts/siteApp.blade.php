
<!DOCTYPE html>
<html lang="en" dir="{{(Session::get('applocale') == 'ar') ? 'rtl' : ' '}}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> @yield('title') - Momenta </title>
  <meta name="rating" content="general">
  <meta name="robots" content="@yield('robots')">
  <meta property="og:locale" content="en_US">
  <meta property="og:url" content="{{ request()->url() }}">
  <meta property="og:title" content="@yield('title')">
  <meta property="og:image" content="@yield('image')">
  <meta property="og:type" content="website">
  <meta name="description" property="og:description" content="@yield('description')">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="@yield('title')">
  <meta name="twitter:description" content="@yield('description')">
  <meta name="twitter:image" content="@yield('image')">
  <meta name="twitter:url" content="{{ request()->url() }}">
  <meta name="token" content="{{ csrf_token() }}">
  <meta itemprop="name" content="@yield('title')">
  <meta itemprop="description" content="@yield('description')">
  <meta itemprop="image" content="@yield('image')">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('i/icons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('i/icons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('i/icons/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('i/icons/site.webmanifest') }}">
  <link rel="mask-icon" href="{{ asset('i/icons/safari-pinned-tab.svg') }}" color="#336699">
  <link rel="shortcut icon" href="{{ asset('i/icons/favicon.ico') }}">
  <meta name="msapplication-TileColor" content="#336699">
  <meta name="msapplication-config" content="{{ asset('i/icons/browserconfig.xml') }}">
  <meta name="theme-color" content="#336699">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="/assets/vendor/owl.carousel//assets/owl.carousel.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <!-- Template Main CSS File -->
    @if(Session::get('applocale') == 'ar')
        <link href="/assets/css/style-rtl.css" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@700&display=swap" rel="stylesheet">

        <style>
            body,
            h1, h2, h3, h4, h5, h6,
            a,
            .popover-body,
            .pro_card-title,
            .btn,
            h4,
            h5,
            p,
            div,
            .sidebar-heading {
                font-family: 'Cairo', sans-serif !important;
                letter-spacing: 0;
            }
           
        </style>
    @else
        <link href="/assets/css/style.css" rel="stylesheet">
    @endif

    <style>
        .services .icon-box-pink .icon {
            background: #e5ffc9 !important;
        }
        .activeLink{
            background: #2c82c7 !important;
        }
        .contact .info-box i {
            font-size: 32px;
            color: #000;
            background: #e5ffc9 !important;
            border-radius: 50%;
            padding: 8px;
            border: 0;
        }

        .nav-menu a:hover, .nav-menu .active > a, .nav-menu li:hover > a {
            color: #fdfdfd;
            text-decoration: none;
        }
        .servicesLinks a{
            color: #000;
        }
        .servicesLinks a:hover, .servicesLinks li:hover{
            color: #5c9422 !important;
        }
         

    </style>

    @yield('styles')

<style>
    .btn-success{
        color: #fff;
    background-color: #a2cf73 !important;
    border-color: #a2cf73 !important; 
    }
</style>

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" style="background: #a2cf73" class="fixed-top class="fixed-top {{(Route::getCurrentRoute()->uri() == '/') ? 'header-transparent' : ' '}}">
    <div class="container-fluid">

      <div class="logo float-left">

          <a href="/"><img src="/assets/logo.png" alt="" class="img-fluid"></a>


      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
      <ul>
          <li class="{{ Request::is('/') ? 'activeLink' : '' }}"><a href="/"> {{__('site.nav.Home')}} </a></li>
         <!-- <li class="drop-down ">
              <a href="#">{{__('site.nav.services')}}</a>
              <ul>
                  <li><a href="/p/house-moving">{{__('site.nav.House Moving')}}</a></li>
                  <li><a href="/p/office-moving"> Office Moving</a></li>
                  <li><a href="/p/moving-abroad">Moving Abroad</a></li>
                  <li><a href="/p/assembly"> Assembly</a></li>
                  <li><a href="/p/packing-unpacking"> Packing + Unpacking </a></li>
                  <li><a href="/p/clearing-dispoal"> Clearing + Dispoal </a></li>
                  <li><a href="/p/transports"> Transports </a></li>
                  <li><a href="/p/furniture-taxi"> Furniture-Taxi </a></li>
              </ul>
          </li>
          -->
          
           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{__('site.nav.services')}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <ul class="servicesLinks">
                      <li><a href="/p/house-moving">{{__('site.nav.House Moving')}}</a></li>
                      <li><a href="/p/office-moving"> Office Moving</a></li>
                      <li><a href="/p/moving-abroad">Moving Abroad</a></li>
                      <li><a href="/p/assembly"> Assembly</a></li>
                      <li><a href="/p/packing-unpacking"> Packing + Unpacking </a></li>
                      <li><a href="/p/clearing-dispoal"> Clearing + Dispoal </a></li>
                      <li><a href="/p/transports"> Transports </a></li>
                      <li><a href="/p/furniture-taxi"> Furniture-Taxi </a></li>
                  </ul>
            </div>
          </li>
      

          <li class="{{ Request::is('p/offer-request') ? 'activeLink' : '' }}"><a href="/p/offer-request"> {{__('site.nav.Offer Request')}}</a></li>

         <!-- <li class="drop-down "><a href="/p/partner"></a>
              
          </li>-->
          
          
           <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{__('site.nav.Partner')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                  <ul class="servicesLinks">
                  <li><a href="/p/I-am-a-driver"> {{__('site.nav.A Driver')}} </a></li>
                  <li><a href="/p/I-own-a-company"> {{__('site.nav.I Own')}}</a></li>
                  <li><a href="/p/become-a-partner"> {{__('site.nav.Become a Partner')}}</a></li>
                </ul>
                </div>
              </li>
        

          <li class="{{ Request::is('p/moving-shop') ? 'activeLink' : '' }}"><a href="/p/moving-shop"> {{__('site.nav.Moving shop')}}</a></li>

         <!-- <li class="drop-down "><a href="#">{{__('site.nav.app')}}</a>
              <ul>
                  <li><a href="/p/the-last-mile"> {{__('site.nav.The last mile')}} </a></li>
              </ul>
          </li>-->
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{__('site.nav.app')}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown3">
               <ul class="servicesLinks">
                  <li><a href="/p/the-last-mile"> {{__('site.nav.The last mile')}} </a></li>
              </ul>
            </div>
          </li>
          
         

          <li class="{{ Request::is('p/sustainability') ? 'activeLink' : '' }}"><a href="/p/sustainability"> {{__('site.nav.Sustainability')}}</a></li>

          <!--<li class="drop-down "><a href="#">{{__('site.nav.About us')}}</a>
              <ul>
                  <li><a href="/p/who-we-are"> {{__('site.nav.Who we are')}}</a></li>
              </ul>
          </li>-->
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{__('site.nav.About us')}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
              <ul class="servicesLinks">
                  <li><a href="/p/who-we-are"> {{__('site.nav.Who we are')}}</a></li>
              </ul>
            </div>
          </li>

          <li class="{{ Request::is('p/contact-us') ? 'activeLink' : '' }}"><a href="/contact-us"> {{__('site.nav.Contact Us')}} </a></li>

 <!-- <select class="form-control" onchange="window.location = this.options[this.selectedIndex].value">
                        <option selected disabled value="">{{__('site.LanguageChangedTo')}}</option>
                        <option value="{{ route('language.switch', 'en')}}">English</option>
                        <option value="{{ route('language.switch', 'de')}}">German</option>
                        <option value="{{ route('language.switch', 'ar')}}">العربية</option>
                    </select>-->
                    
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown23" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Language
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown23">
              <ul class="servicesLinks">
                  <li><a href="{{ route('language.switch', 'en')}}"><img src="/images/usa.png" width="20">  English </a></li>
                  <li><a href="{{ route('language.switch', 'de')}}"><img src="/images/de.png" width="20">  German  </a></li>
                  <li><a href="{{ route('language.switch', 'ar')}}"><img src="/images/eg.png" width="20"> العربية </a></li>
              </ul>
            </div>
          </li>

      </ul>
  </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
@yield('content')
  <!-- ======= Footer ======= -->
  <footer id="footer" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

    {{--<div class="footer-newsletter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h4>{{__('site.footer.Our Newsletter')}}</h4>
            <p>{{__('site.footer.Our Newsletter footer')}}</p>
          </div>
          <div class="col-lg-6">
            <form action="/sendEmail" method="post">
                @csrf
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>--}}


    <div class="container text-center">
        <div class="row">
          <div class="col-md-4 footer-top" style="padding: 0 !important; background: transparent !important; border: none !important;">
            <div class="social-links mt-3 text-left">
         {{--     <a target="_blank" href="{{config('settings.twitter')}}" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a target="_blank" href="{{config('settings.facebook')}}" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a target="_blank" href="{{config('settings.instagram')}}" class="instagram"><i class="bx bxl-instagram"></i></a>--}}
              <a target="_blank" href="{{config('settings.linkedin')}}" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              <a target="_blank" style="background: none;font-size: 14px;width: 97px;" href="/privacy">Privacy Policy</a>
            </div>
            
               <div style="text-align: start;">
         
          <p><i class="icofont-home me-3"></i>  Wunstorferstrasse 42, 30454 Hannover </p>
          <p>
            <a href="mailto:Info@momentaa.de">
                <i class="icofont-envelope me-3"></i>
            Info@momentaa.de
            </a>
          </p>
          <p>
            <a href="tel:017661710748">
                <i class="icofont-phone me-3"></i>
            017661710748
            </a>
          </p>
          
          
          
        </div>
        
          </div>
          
       
        

            <div class="col-md-5">
                <div class="copyright">
                    &copy; Copyright <strong><span>{{config('settings.site_title')}}</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="col-md-3">
                <div class="copyright">
                    <select class="form-control" onchange="window.location = this.options[this.selectedIndex].value">
                        <option selected disabled value="">{{__('site.LanguageChangedTo')}}</option>
                        <option value="{{ route('language.switch', 'en')}}">English</option>
                        <option value="{{ route('language.switch', 'de')}}">German</option>
                        <option value="{{ route('language.switch', 'ar')}}">العربية</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/jquery/jquery.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/venobox/venobox.min.js"></script>
  <script src="/assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="/assets/vendor/counterup/counterup.min.js"></script>
  <script src="/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  @yield('scripts')
  <script>
    $(document).ready( function() { // Wait until document is fully parsed
  $("#myFrom").on('submit', function(e){
     e.preventDefault();
    let content = $('#myFrom').serialize();
            location.href=`mailto:info@momentaa.de?${content}`;
  });
})

  </script>
</body>

</html>
