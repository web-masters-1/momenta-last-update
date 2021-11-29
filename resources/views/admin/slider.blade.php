@extends('layouts.admin')

@section('content')
    <section class="section">
        @include('layouts.flash')
        <div class="container is-fluid">
            <div class="card no-box-shadow-mobile">
                <header class="card-header">
                    <p class="card-header-title">
                      Sliders
                    </p>
                    <!-- Button trigger modal -->
                <button type="button" class="button is-primary" id="addBtn">Add slider &nbsp;<span class="icon">{!! icon('plus') !!}</span></button>
                </header>

                <div class="card-content" style="padding-bottom: 2rem;">

                  <table class="table table-striped" id="tabeSlider">

                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Caption</th>
                        <th scope="col">Image</th>
                        <th scope="col">Is home?</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($sliders as $key => $row)
                      <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$row->title}}</td>
                        <td>{{$row->caption}}</td>
                        <td><img src="/images/sliders/{{$row->image}}" width="100"></td>
                          <td>
                              {{($row->status ==1)? 'Yes' : 'No'}}
                          </td>
                        <td>
                            <a href="/admin/slider/edit/{{$row->id}}" class="button is-success">
                                Edit <span class="fa fa-pen"></span>
                            </a>
                            <a href="/admin/slider/{{$row->id}}" class="button is-danger">
                                Delete <span class="fa fa-trash"></span>
                            </a>
                        </td>
                      </tr>
                        @endforeach

                    </tbody>
                    </table>

                    <form method="POST" enctype="multipart/form-data" action="/admin/slider" id="formAdd" style="display: none">
                        @csrf
                      <div class="field">
                          <label class="label">Slider Title</label>
                          <div class="control">
                              <input class="input is-large " value="" type="text" name="title">
                          </div>
                      </div>

                      <div class="field">
                          <label class="label">Slider Caption</label>
                          <div class="control">
                              <input class="input is-large " value="" type="text" name="caption">
                          </div>
                      </div>

                        <div class="field">
                            <label class="label">Slider button name</label>
                            <div class="control">
                                <input class="input is-large " value="" type="text" name="button_name">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Slider button link</label>
                            <div class="control">
                                <input class="input is-large " value="" type="text" name="button_link">
                            </div>
                        </div>

                      <div class="field">
                          <label class="label">Slider Image</label>
                          <div class="control">
                              <input class="input is-large " value="" type="file" name="image">
                          </div>
                      </div>

                      <div class="control">
                          <button type="submit" class="button is-info is-fullwidth is-large">Save</button>
                      </div>
                  </form>

                </div>
            </div>
        </div>
    </section>


@section('scripts')
<script>
$('#addBtn').click(function(){
  $('#tabeSlider').toggle();
  $('#formAdd').toggle();
})
</script>

@endsection


@endsection
