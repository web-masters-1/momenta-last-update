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

                    <form method="POST" enctype="multipart/form-data" action="{{route('admin.service.update', $row->id)}}" id="formAdd">
                        @csrf
                        @method('put')
                        <div class="field">
                            <label class="label">Service Title</label>
                            <div class="control">
                                <input class="input is-large " value="{{$row->title}}" type="text" name="title">
                            </div>
                        </div>


                        <div class="field">
                            <label class="label">Service Description</label>
                            <div class="control">
                                <input class="input is-large " value="{{$row->description}}" type="text" name="description">
                            </div>
                        </div>



                        <div class="field">
                            <label class="label">service content</label>
                            <div class="control">
                                <textarea class="editor" name="content">{{$row->content}}</textarea>
                            </div>
                        </div>

                        <div class="field border p-3">
                            <label class="label">Current image</label>
                            <img src="/images/services/{{$row->image}}" id="blahImage" width="100">
                            <div class="control">
                                <label class="label">Change image</label>
                                <input value="{{$row->image}}" class="input is-large"  onchange="document.getElementById('blahImage').src = window.URL.createObjectURL(this.files[0])" id="imgInpImage" type="file" name="image">
                            </div>
                        </div>
                        
                        <div class="field border p-3">
                            <label class="label">Current icon</label>
                            <img src="/images/icons/{{$row->icon}}" id="blahIcon" width="100">
                            <div class="control">
                                <label class="label">Change Icon</label>
                                <input value="{{$row->icon}}" class="input is-large"  onchange="document.getElementById('blahIcon').src = window.URL.createObjectURL(this.files[0])" id="imgInp" type="file" name="icon">
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
