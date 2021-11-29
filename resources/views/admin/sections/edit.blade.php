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

                    <form method="POST" enctype="multipart/form-data" action="{{route('admin.section.update', $row->id)}}" id="formAdd">
                        @csrf
                        @method('put')
                        <div class="field">
                            <label class="label">Section Title</label>
                            <div class="control">
                                <input class="input is-large " value="{{$row->title}}" type="text" name="title">
                            </div>
                        </div>

                        @if($row->sub_title)
                        <div class="field">
                            <label class="label">Section Subtitle</label>
                            <div class="control">
                                <input class="input is-large " value="{{$row->sub_title}}" type="text" name="sub_title">
                            </div>
                        </div>
                        @endif

                        @if($row->text)
                        <div class="field">
                            <label class="label">Section Text</label>
                            <div class="control">
                                <textarea class="editor" name="text">{{$row->text}}</textarea>
                            </div>
                        </div>
                        @endif

                        @if($row->link)
                        <div class="field">
                            <label class="label">Section link</label>
                            <div class="control">
                                <input class="input is-large" value="{{$row->link}}" type="text" name="link">
                            </div>
                        </div>
                        @endif

                        @if($row->image)
                        <div class="field border p-3">
                            <label class="label">Current Slider Image</label>
                            <img src="/images/sections/{{$row->image}}" id="blah" width="100">
                            <div class="control">
                                <label class="label">Change Image</label>
                                <input value="{{$row->image}}" class="input is-large" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" id="imgInp" type="file" name="image">
                            </div>
                        </div>
                        @endif

                        @if($row->icon)
                        <div class="field border p-3">
                            <label class="label">Current section icon</label>
                            <img src="/images/icons/{{$row->icon}}" id="blahIcon" width="100">
                            <div class="control">
                                <label class="label">Change Image</label>
                                <input value="{{$row->icon}}" class="input is-large"  onchange="document.getElementById('blahIcon').src = window.URL.createObjectURL(this.files[0])" id="imgInp" type="file" name="icon">
                            </div>
                        </div>
                        @endif

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
