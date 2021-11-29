@extends('layouts.admin')

@section('content')
    <section class="section">
        <div class="container is-fluid">
            <div class="card no-box-shadow-mobile">
                <header class="card-header">
                    <h2 class="card-header-title">
                        {{$row->title}}
                    </h2>

                </header>

                <div class="card-content" style="padding-bottom: 2rem;">

                    <form method="POST" enctype="multipart/form-data" action="{{route('admin.slider.update', $row->id)}}" id="formAdd">
                        @csrf
                        @method('put')
                        <div class="field">
                            <label class="label">Slider Title</label>
                            <div class="control">
                                <input class="input is-large " value="{{$row->title}}" type="text" name="title">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Slider Caption</label>
                            <div class="control">
                                <input class="input is-large " value="{{$row->caption}}" type="text" name="caption">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Slider button name</label>
                            <div class="control">
                                <input class="input is-large " value="{{$row->button_name}}" type="text" name="button_name">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Slider button link</label>
                            <div class="control">
                                <input class="input is-large " value="{{$row->button_value}}" type="text" name="button_value">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Show in home?</label>
                            <div class="control">
                                <input style="width: 100px; height:40px" value="1" {{($row->status==1)?'checked':''}} type="checkbox" name="status">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Current Slider Image</label>
                            <img src="/images/sliders/{{$row->image}}" id="blah" width="100">
                            <div class="control">
                                <label class="label">Change Image</label>
                                <input class="input is-large"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" id="imgInp" type="file" name="image">
                            </div>
                        </div>

                        <div class="control">
                            <button type="submit" class="button is-info is-fullwidth is-small">Edit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>


@section('scripts')


    <script>

        $('#imgInp').onchange = evt => {
            const [file] = $('#imgInp').files
            if (file) {
                $('#blah').src = URL.createObjectURL(file)
            }
        }

    </script>

@endsection


@endsection
