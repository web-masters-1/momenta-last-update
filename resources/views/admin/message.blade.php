@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="card no-box-shadow-mobile">
                <header class="card-header">
                    <p class="card-header-title">
                      Messages
                    </p>
                    <!-- Button trigger modal -->

                </header>
                <div class="card-content" style="padding-bottom: 2rem;">

                  <table class="table table-striped" id="tabeSlider">

                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">User name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Feedback</th>
                        <th scope="col">Service</th>
                        <th scope="col">Sent at</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($rows as $key => $row): ?>
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->body}}</td>
                        <td>{{$row->title}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>
                            @if($row->status == 0)
                            <a href="/admin/message/{{$row->id}}" class="button is-success">Show in home <span class="fa fa-eye"></span></a>
                            @else
                                <a href="/admin/message/{{$row->id}}" class="button is-warning">Hide from home <span class="fa fa-hide"></span></a>
                            @endif
                        </td>
                      </tr>
                        <?php endforeach; ?>

                    </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>




@endsection
