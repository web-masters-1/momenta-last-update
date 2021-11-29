@extends('site.layouts.siteApp')

@section('content')

    <main id="main">

        <!-- ======= Contact Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Offer Request</h2>
                    <ol>
                        <li><a href="#">Home</a></li>
                        <li>Offer Request</li>
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
                    <div class="col-lg-12">
                        <form action="/request/add" method="post" role="form">
                            @csrf

                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label> Choose service </label>
                                    <select name="service" class="form-control" onclick="checkService(this)">
                                        <option disabled selected>- Choose service -</option>
                                        <option value="House Moving">House Moving</option>
                                        <option value="Office Moving">Office Moving</option>
                                        <option value="Moving abroad">Moving abroad</option>
                                        <option value="Assembly">Assembly</option>
                                        <option value="Packing ">Packing</option>
                                        <option value="clearing">clearing</option>
                                        <option value="transports">transports</option>
                                        <option value="Taxi">Taxi</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>


                                <div class="col-md-6 form-group">
                                    <label>Desired date </label>
                                    <input type="date" name="date" class="form-control">
                                </div>


                            </div>
                            <hr class="hideElements">
                            <h4 class="hideElements">From</h4>
                            <div class="form-row hideElements">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="from_street" placeholder="Street address" class="form-control">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="from_postcode"
                                           placeholder="Postcode/city">
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <select name="from_room" class="form-control">
                                        <option disabled selected>- Choose room -</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="2.5">2.5</option>
                                        <option value="3">3</option>
                                        <option value="3.5">3.5</option>
                                        <option value="4">4</option>
                                        <option value="4.5">4.5</option>
                                        <option value="5">5</option>
                                        <option value="others">others</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <select class="custom-select" id="liftBtn">
                                                <option value="1">With lift</option>
                                                <option value="2">Without lift</option>
                                            </select>
                                        </div>
                                        <select name="from_lift" class="form-control" id="withlifts">
                                            <option disabled selected>- floor/lift -</option>
                                            <option value="1 with lift">1 floor with lift</option>
                                            <option value="2 with lift">2 floor with lift</option>
                                            <option value="3 with lift">3 floor with lift</option>
                                            <option value="4 with lift">4 floor with lift</option>
                                            <option value="5 with lift">5 floor with lift</option>
                                            <option value="6 with lift">6 floor with lift</option>
                                            <option value="7 with lift">7 floor with lift</option>
                                            <option value="more than 7 with lift">more than 7 floor with lift</option>
                                        </select>

                                        <select name="from_lift" class="form-control" id="withoutlifts"
                                                style="display: none">
                                            <option disabled selected>- floor/lift -</option>
                                            <option value="1 without lift">1 floor without lift</option>
                                            <option value="2 without lift">2 floor without lift</option>
                                            <option value="3 without lift">3 floor without lift</option>
                                            <option value="4 without lift">4 floor without lift</option>
                                            <option value="5 without lift">5 floor without lift</option>
                                            <option value="6 without lift">6 floor without lift</option>
                                            <option value="7 without lift">7 floor without lift</option>
                                            <option value="more than 7 with lift">more than 7 floor with lift</option>
                                        </select>

                                    </div>
                                </div>


                            </div>

                            <h4 class="hideElements">To</h4>
                            <div class="form-row hideElements">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="to_street" class="form-control" placeholder="Street address">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control" name="to_postcode" placeholder="Postcode/city">
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <select name="to_room" class="form-control" id="service">
                                        <option disabled selected>- Choose room -</option>
                                        <option value="1">1</option>
                                        <option value="1.5">1.5</option>
                                        <option value="2">2</option>
                                        <option value="2.5">2.5</option>
                                        <option value="3">3</option>
                                        <option value="3.5">3.5</option>
                                        <option value="4">4</option>
                                        <option value="4.5">4.5</option>
                                        <option value="5">5</option>
                                        <option value="others">others</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <select class="custom-select" id="to_liftBtn">
                                                <option value="1">With lift</option>
                                                <option value="2">Without lift</option>
                                            </select>
                                        </div>
                                        <select name="to_lift" class="form-control" id="to_withlifts">
                                            <option disabled selected>- floor/lift -</option>
                                            <option value="1 with lift">1 floor with lift</option>
                                            <option value="2 with lift">2 floor with lift</option>
                                            <option value="3 with lift">3 floor with lift</option>
                                            <option value="4 with lift">4 floor with lift</option>
                                            <option value="5 with lift">5 floor with lift</option>
                                            <option value="6 with lift">6 floor with lift</option>
                                            <option value="7 with lift">7 floor with lift</option>
                                            <option value="more than 7 with lift">more than 7 floor with lift</option>
                                        </select>

                                        <select name="from_lift" class="form-control" id="to_withoutlifts"
                                                style="display: none">
                                            <option disabled selected>- floor/lift -</option>
                                            <option value="1 without lift">1 floor without lift</option>
                                            <option value="2 without lift">2 floor without lift</option>
                                            <option value="3 without lift">3 floor without lift</option>
                                            <option value="4 without lift">4 floor without lift</option>
                                            <option value="5 without lift">5 floor without lift</option>
                                            <option value="6 without lift">6 floor without lift</option>
                                            <option value="7 without lift">7 floor without lift</option>
                                            <option value="more than 7 with lift">more than 7 floor with lift</option>
                                        </select>

                                    </div>
                                </div>


                            </div>

                            <hr>
                            <h5>Personal info</h5>
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
                                    <textarea rows="6" name="message" class="form-control"
                                              placeholder="Message"></textarea>
                                </div>


                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-md btn-block btn-success">Send Request</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->


    </main><!-- End #main -->

@endsection

@section('scripts')
    <script>
        $('#liftBtn').click(function () {
            if (this.value == '1') {
                $('#withlifts').show();
                $('#withoutlifts').hide();
            } else {
                $('#withlifts').hide();
                $('#withoutlifts').show();
            }
        });

        $('#to_liftBtn').click(function () {
            if (this.value == '1') {
                $('#to_withlifts').show();
                $('#to_withoutlifts').hide();
            } else {
                $('#to_withlifts').hide();
                $('#to_withoutlifts').show();
            }
        });
        
        
        
        function checkService(ele){
            if(ele.value == 'others'){
                $('.hideElements').hide();
            }
        }
    </script>
@endsection
