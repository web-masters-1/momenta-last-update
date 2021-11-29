@extends('layouts.admin')

@section('content')
    <section class="section">
        @include('layouts.flash')
        <div class="container is-fluid">
            <div class="card no-box-shadow-mobile">
                <header class="card-header">
                    <p class="card-header-title">
                      Services
                    </p>
                    <!-- Button trigger modal -->
                </header>

                <div class="card-content" style="padding-bottom: 2rem;">

                  <table class="table table-striped" id="tabeSlider">

                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($rows as $key => $row)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$row->title}}</td>
                        <td>
                            <a href="/admin/service/{{$row->id}}" class="button is-success">
                                Edit <span class="fa fa-pen"></span>
                            </a>
                        </td>
                      </tr>
                        @endforeach

                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>


@section('scripts')



@endsection


@endsection
