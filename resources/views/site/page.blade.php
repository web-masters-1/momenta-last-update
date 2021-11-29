@extends('site.layouts.siteApp')

@section('content')
<style>
    .contactUs{
        position: absolute;
        bottom: 0;
        right: 2px;
    }
</style>
<?php //dd($post);?>
    <main id="main">

        <!-- ======= Blog Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    {{--<h2>{{$post->title}}</h2>--}}

                    <ol>
                        <li><a href="/">Home</a></li>
                        <li><span>{{$post->title}}</span></li>
                    </ol>
                </div>

            </div>
        </section><!-- End Blog Section -->

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show text-center">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center">
                {!! session('success') !!}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('message'))
            <div class="alert alert-info alert-dismissible fade show text-center">
                {!! session('message') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show text-center">
                {!! session('error') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif


    <!-- ======= Blog Section ======= -->
        <section class="blog" data-aos="fade-up">
            <div class="container">

                <div class="row">

                    <div class="col-lg-12 entries">

                        <article class="entry entry-single">
                            <!-- <div class="entry-img">
                                <img src="featured_image}}" alt="" class="img-fluid">
                            </div> -->

                            <h2 class="entry-title">
                                {{$post->title}}
                            </h2>

                            <div class="entry-content">
                                @if($post->id == 19 || $post->parent_id == 19)
                                    @if($post->image)
                                        <div class="text-center mt-2 mb-4" style="position: relative;">
                                            <img src="/images/services/{{$post->image}}" class="img-fluid" style="max-height: 400px;width: 83%;margin: 0 auto;">
                                        
                                            <a href="/p/contact-us" class="btn contactUs btn-success">Contact us <i class="icofont-envelope"></i></i></a>
                                        </div>
                                        
                                    @endif
                                @endif
                                {!!  $post->content !!}
                            </div>

                           {{-- <div class="entry-footer clearfix">
                                <div class="float-right share">
                                    <a href="" title="Share on Twitter"><i class="icofont-twitter"></i></a>
                                    <a href="" title="Share on Facebook"><i class="icofont-facebook"></i></a>
                                    <a href="" title="Share on Instagram"><i class="icofont-instagram"></i></a>
                                </div>

                            </div>--}}

                        </article><!-- End blog entry -->
                        @if($post->id == 19 || $post->parent_id == 19)
                        <div class="blog-comments">

                             {{--
                              <h4 class="comments-count">Comments & feedback - {{count($comments)}}</h4>
                             @foreach ($comments as $key => $row)

                              <div id="comment-1" class="comment">
                                <div class="d-flex">
                                  <div class="comment-img"><img src="/assets/img/user.webp" width="100"></div>
                                  <div>
                                    <h5><a href="">{{$row->name}}</a></h5>

                                    <time datetime="2020-01-01">{{$row->created_at}}</time>
                                    <p>
                                      @for($i=0; $i<$row->rates; $i++)
                                        <i style="color: orange" class="icofont-star"></i>
                                      @endfor
                                      <br>
                                      {{$row->body}}
                                    </p>
                                  </div>
                                </div>
                              </div>
                              <hr>
                              @endforeach--}}


                            <div class="reply-form">
                                <h4>Feedback the service</h4>
                                <form action="/add/comment" method="post">
                                    @csrf
                                    <input type="hidden" name="page_id" value="{{$post->id}}">
                                    <input type="hidden" name="parent_id" value="{{$post->parent_id}}">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <input name="name" type="text" class="form-control"
                                                   placeholder="{{__('post.urname')}}*">
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input name="email" type="text" class="form-control"
                                                   placeholder="{{__('post.urEmail')}}*">
                                        </div>
                                    </div>
                                    <label>Rates</label>
                                    <div class="rating">
                                        <span class="rating__result"></span>
                                        <i class="rating__star far fa-star"></i>
                                        <i class="rating__star far fa-star"></i>
                                        <i class="rating__star far fa-star"></i>
                                        <i class="rating__star far fa-star"></i>
                                        <i class="rating__star far fa-star"></i>
                                    </div>

                                      <input id="rates" name="rates" type="hidden">


                                    <div class="row">
                                        <div class="col form-group">
                                            <textarea name="comment" class="form-control"
                                                      placeholder="Your Comment*"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Post Comment</button>
                                </form>
                            </div>

                        </div><!-- End blog comments -->
                        @endif
                    </div><!-- End blog entries list -->


                </div><!-- End row -->

            </div><!-- End container -->

        </section><!-- End Blog Section -->

    </main><!-- End #main -->

    <style>
      i{
        font-family: 'fontawesome' !important;
      }
         .rating {
           position: relative;
          width: 28%;
          background: transparent;
          display: flex;
          justify-content: center;
          align-items: center;
          gap: 0.3em;
          padding: 7px;
          margin: 10px;
          overflow: hidden;
         }

         .rating__result {
           position: absolute;
            top: 4px;
            left: 7px;
            transform: translateY(-10px) translateX(-5px);
            z-index: -9;
            font: 3em Arial, Helvetica, sans-serif;
            color: #000;
            pointer-events: none;
         }

         .rating__star {
             font-size: 1.3em;
             cursor: pointer;
             color: #dabd18b2;
             transition: filter linear .3s;
         }

         .rating__star:hover {
             filter: drop-shadow(1px 1px 4px gold);
         }
         .entry-content img{
             width: 100%;
         }

     </style>



         <script>
             const ratingStars = [...document.getElementsByClassName("rating__star")];
             const ratingResult = document.querySelector(".rating__result");

             printRatingResult(ratingResult);

             function executeRating(stars, result) {
                 const starClassActive = "rating__star fas fa-star";
                 const starClassUnactive = "rating__star far fa-star";
                 const starsLength = stars.length;
                 let i;
                 stars.map(star => {
                     star.onclick = () => {
                         i = stars.indexOf(star);

                         if (star.className.indexOf(starClassUnactive) !== -1) {
                             printRatingResult(result, i + 1);
                             for (i; i >= 0; --i) {

                                 stars[i].className = starClassActive;
                             }

                         } else {
                             printRatingResult(result, i);
                             for (i; i < starsLength; ++i) {

                                 stars[i].className = starClassUnactive;
                             }

                         }
                     };
                 });
             }

             function printRatingResult(result, num = 0) {
                 result.textContent = `${num}/5`;
                 //alert(`${num}`);
                 let i = document.getElementById('rates');
                 i.value = num;
             }

             executeRating(ratingStars, ratingResult);


         </script>

@endsection
