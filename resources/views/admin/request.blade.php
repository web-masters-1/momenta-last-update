@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="card no-box-shadow-mobile">
                <header class="card-header">
                    <p class="card-header-title">
                        Offer Requests
                    </p>
                    <!-- Button trigger modal -->

                </header>
                <div class="card-content" style="padding-bottom: 2rem;">

                    <table class="table table-striped" id="tabeSlider">

                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Sent at</th>
                            <th scope="col">Actio</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($rows as $key => $row): ?>
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->subject}}</td>
                            <td>{{$row->body}}</td>
                            <td>{{$row->created_at}}</td>
                            <td><a href="/admin/request/{{$row->id}}" class="button is-danger">Delete &nbsp;&nbsp;<span class="icon">{!! icon('trash') !!}</span></a></td>
                        </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </section>




@endsection
