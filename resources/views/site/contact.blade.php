@extends('site.layouts.siteApp')

@section('content')

    <main id="main">
        <!-- ======= Contact Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Contact</h2>
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li>Contact</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Contact Section -->
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
        <!-- ======= Contact Section ======= -->
        <section class="contact" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">

                <div class="row">

                    <div class="col-lg-6">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="info-box">
                                    <i class="bx bx-map"></i>
                                    <h3>Our Address</h3>
                                    <p>{{config('settings.address')}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bx bx-envelope"></i>
                                    <h3>Email Us</h3>
                                    <p>{{config('settings.email')}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-box">
                                    <i class="bx bx-phone-call"></i>
                                    <h3>Call Us</h3>
                                    <p>{{config('settings.phone')}}</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="#" method="post" role="form" id="myFrom">
                            {{--<div class="form-row">
                                <div class="col-md-12 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Your Name" data-rule="minlen:4"
                                           data-msg="Please enter at least 4 chars"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                       placeholder="Subject" data-rule="minlen:4"
                                       data-msg="Please enter at least 8 chars of subject"/>
                                <div class="validate"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="body" rows="8" data-rule="required"
                                          data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validate"></div>
                            </div>
                            --}}
                            
                            <div class="form-row">
                                <div class="col-md-12 form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <select class="custom-select" id="inputGroupSelect04">
                                                <option value="1">Mr</option>
                                                <option value="2">Mis</option>
                                            </select>
                                        </div>
                                        <input type="text" name="name" class="form-control" placeholder="First name/ Last name">
                                    </div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email">
                                </div>

                                <div class="col-md-6 form-group">
                                    <input type="text" name="phone" class="form-control" placeholder="Telephone">
                                </div>

                                <div class="col-md-12 form-group">
                                    <textarea rows="6" name="message" class="form-control" placeholder="Message"></textarea>
                                </div>


                            </div>
                            
                            <div class="text-center">
                                <button type="submit" onclick="sendToEmail(event)" class="btn btn-info btn-block">Send Message</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->


    </main><!-- End #main -->

@section('scripts')
    <script>
        function sendToEmail(e){
            e.preventDefault();
           let content = $('#myFrom').serialize();
            location.href=`mailto:info@momentaa.de?${content}`;
        }

    </script>
@endsection

@endsection
