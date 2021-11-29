
@extends('site.layouts.siteApp')
@section('content')
  <!-- ======= Hero Section ======= -->
<style>
.carousel,
.carousel-item,
.carousel-inner {
    height: 440px !important;
    width: 100% !important;
}

#myCarousel::after {
  content: '';
      position: absolute;
      left: 50%;
      top: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to right, rgba(30, 67, 86, 0.8), rgba(30, 67, 86, 0.6)), center top no-repeat;
      z-index: 0;
      transform: translateX(-50%) rotate(0deg);
}
.img-circle{
  border-radius: 50%;
}
.services .icon-box-pink:hover {
  border-color: #0c67ad;
}
@media screen and (min-width: 1400px) {
  .carousel-item img{
    width: 100%;
  }
}

</style> 

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    </ol>
    <div class="carousel-inner">

      @foreach($sliders as $idx=>$row)

      <div class="carousel-item {{($idx==0)? 'active' : ''}}">
        <img src="/images/sliders/{{$row->image}}"  alt="{{$row->title}}"> <!--  // class="d-block w-100" -->
        <div class="carousel-caption">
          <div class="carousel-container">
            <h2 class="animate__animated animate__fadeInDown">{{$row->title}}</h2>
            <p class="animate__animated animate__fadeInUp">{{$row->caption}}</p>
          </div>
          <a href="{{$row->button_value}}" class="btn btn-success">{{$row->button_name}}</a>
        </div>
      </div>
      @endforeach

    </div>


    <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>



  <main id="main" style="margin-top: 0px !important;">

    <!-- ======= Services Section ======= -->
    <section class="services">
      <div class="container">

        <div class="row">
          @foreach($services as $row)
          <div class="col-md-6 col-lg-3 aos-init aos-animate" data-aos="fade-up">
            <a href="/p/{{$row->slug}}" style="color: #000">
               <div class="icon-box icon-box-pink">
                    <div class="icon">
                      <img src="/images/icons/{{$row->icon}}" width="45">
                    </div>
                 <h4 class="title">{{$row->title}}</h4>
                  <p class="description">{{$row->description}}</p>
                </div>
            </a>
          </div>
          @endforeach


        </div>
        </div>

      </div>
    </section><!-- End Services Section -->


    <section class="why-us section-bg" data-aos="fade-up" date-aos-delay="100">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 video-box">
            <img src="/images/sections/{{$sections[0]->image}}" class="img-fluid" alt="">
            <a href="{{$sections[0]->link}}" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a>
          </div>

          <div class="col-lg-6 d-flex pt-3">

            <div class="icon-box">
              <div class="icon">
                <img src="/images/icons/{{$sections[0]->icon}}" class="img-fluid">
              </div>
              <h4 class="title"><a href="">{{$sections[0]->title}}</a></h4>
              <p class="description">
                <i>{{$sections[0]->sub_title}}</i>
              <br>
                {!! $sections[0]->text !!}
              </p>
            </div>


          </div>
        </div>
      </div>
    </section>

    <section class="services">
      <div class="container">

        <div class="row">

          <div class="col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
                <div class="icon">
                  <img src="/images/icons/{{$sections[1]->icon}}" width="45">
                </div>
              <h4 class="title">
                {{$sections[1]->title}}
              </h4>
              <p class="description">{{$sections[1]->sub_title}}</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon">
                <img src="/images/icons/{{$sections[2]->icon}}" width="45">
              </div>
              <h4 class="title">
                {{$sections[2]->title}}
              </h4>
              <p class="description">{{$sections[2]->sub_title}}</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 aos-init aos-animate" data-aos="fade-up">
            <div class="icon-box icon-box-pink">
              <div class="icon">
                <img src="/images/icons/{{$sections[3]->icon}}" width="45">
              </div>
              <h4 class="title">
                {{$sections[3]->title}}
              </h4>
              <p class="description">{{$sections[3]->sub_title}}</p>
            </div>
          </div>



        </div>
      </div>

    </section>

    <section class="testimonials" dir="ltr">
      <div class="container">

        <div class="row">
          <div class="col-sm-12">
            <div id="customers-testimonials" class="owl-carousel">

              <!--TESTIMONIAL 1 -->
              @foreach($feedbacks as $row)
              <div class="item">
                <div class="shadow-effect">
                  <img class="img-circle" src="/images/user.png" alt="">

                  <p>
                    {{$row->body}}
                  </p>
                  <p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </p>
                </div>
                <div class="testimonial-name">{{$row->name}}</div>
              </div>
              @endforeach
              {{--  <!--END OF TESTIMONIAL 1 -->
              <!--TESTIMONIAL 2 -->
              <div class="item">
                <div class="shadow-effect">
                  <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                  <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                  <p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </p>
                </div>
                <div class="testimonial-name">ANNA ITURBE</div>
              </div>
              <!--END OF TESTIMONIAL 2 -->
              <!--TESTIMONIAL 3 -->
              <div class="item">
                <div class="shadow-effect">
                  <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                  <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                  <p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </p>
                </div>
                <div class="testimonial-name">LARA ATKINSON</div>
              </div>
              <!--END OF TESTIMONIAL 3 -->
              <!--TESTIMONIAL 4 -->
              <div class="item">
                <div class="shadow-effect">
                  <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                  <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                  <p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </p>
                </div>
                <div class="testimonial-name">IAN OWEN</div>
              </div>
              <!--END OF TESTIMONIAL 4 -->
              <!--TESTIMONIAL 5 -->
              <div class="item">
                <div class="shadow-effect">
                  <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                  <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                  <p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </p>
                </div>
                <div class="testimonial-name">MICHAEL TEDDY</div>
              </div>
              <!--END OF TESTIMONIAL 5 -->
          --}}
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ======= Features Section ======= -->
    <section class="features">
      <div class="container">

        <div class="section-title">
          <h2>{{$sections[8]->title}}</h2>
          <p>
            {!! $sections[8]->text !!}
          </p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="/images/sections/{{$sections[4]->image}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-0">
            <h3>{{$sections[4]->title}}</h3>
            <p class="font-italic">
              {{$sections[4]->sub_title}}
            </p>
            {!! $sections[4]->text !!}
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="/images/sections/{{$sections[5]->image}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-0 order-2 order-md-1">
            <h3>{{$sections[5]->title}}</h3>
            <p class="font-italic">
              {{$sections[5]->sub_title}}
            </p>
            <p>
              {!! $sections[5]->text !!}
            </p>
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5">
            <img src="/images/sections/{{$sections[6]->image}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-0">
            <h3>{{$sections[6]->title}}</h3>
            <p>{{$sections[6]->sub_title}}</p>
            {!! $sections[6]->text !!}
          </div>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="/images/sections/{{$sections[7]->image}}" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-0 order-2 order-md-1">
            <h3>{{$sections[7]->title}}</h3>
            <p class="font-italic">
              {{$sections[7]->sub_title}}
            </p>
            <p>
              {!! $sections[7]->text !!}
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->

  </main><!-- End #main -->
@section('styles')

  <style>
    .shadow-effect {
      background: #fff;
      padding: 20px;
      border-radius: 4px;
      text-align: center;
      border:1px solid #ECECEC;
      box-shadow: 0 19px 38px rgba(0,0,0,0.10), 0 15px 12px rgba(0,0,0,0.02);
    }
    #customers-testimonials .item i{
      color: orange;
    }
    #customers-testimonials .shadow-effect p {
      font-family: inherit;
      font-size: 17px;
      line-height: 1.5;
      margin: 0 0 17px 0;
      font-weight: 300;
    }
    .testimonial-name {
      margin: -17px auto 0;
      display: table;
      width: auto;
      background: #3190E7;
      padding: 9px 35px;
      border-radius: 12px;
      text-align: center;
      color: #fff;
      box-shadow: 0 9px 18px rgba(0,0,0,0.12), 0 5px 7px rgba(0,0,0,0.05);
    }
    #customers-testimonials .item {
      text-align: center;
      padding: 50px;
      margin-bottom:80px;
      opacity: .2;
      transform: scale3d(0.8, 0.8, 1);
      transition: all 0.3s ease-in-out;
    }
    #customers-testimonials .owl-item.active.center .item {
      opacity: 1;
      transform: scale3d(1.0, 1.0, 1);
    }
    .owl-carousel .owl-item img {
      transform-style: preserve-3d;
      max-width: 90px;
      margin: 0 auto 17px;
    }
    #customers-testimonials.owl-carousel .owl-dots .owl-dot.active span,
    #customers-testimonials.owl-carousel .owl-dots .owl-dot:hover span {
      background: #3190E7;
      transform: translate3d(0px, -50%, 0px) scale(0.7);
    }
    #customers-testimonials.owl-carousel .owl-dots{
      display: inline-block;
      width: 100%;
      text-align: center;
    }
    #customers-testimonials.owl-carousel .owl-dots .owl-dot{
      display: inline-block;
    }
    #customers-testimonials.owl-carousel .owl-dots .owl-dot span {
      background: #3190E7;
      display: inline-block;
      height: 20px;
      margin: 0 2px 5px;
      transform: translate3d(0px, -50%, 0px) scale(0.3);
      transform-origin: 50% 50% 0;
      transition: all 250ms ease-out 0s;
      width: 20px;
    }
  </style>
@endsection

@section('scripts')


  <script>
    jQuery(document).ready(function ($) {
      "use strict";
      //  TESTIMONIALS CAROUSEL HOOK
      $('#customers-testimonials').owlCarousel({
        loop: true,
        center: true,
        items: 3,
        margin: 0,
        autoplay: true,
        dots: true,
        autoplayTimeout: 4500,
        smartSpeed: 450,
        responsive: {
          0: {
            items: 1 },

          768: {
            items: 2 },

          1170: {
            items: 3 } } });



    });
  </script>
@endsection

@endsection
