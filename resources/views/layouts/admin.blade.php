<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="noindex,nofollow">
    <title>{{ empty($t) ? (is_array($title = __(Route::getCurrentRoute()->getName())) ? $title['title'] : $title) : $t }} | {{ config('settings.site_title') }}</title>
    <link rel="stylesheet" type="text/css" href="/dist/css/admin.css">
    <link rel="shortcut icon" href="/i/icons/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @stack('styles')
</head>
<body>
@if($currentUser = auth()->user())@include('partials.admin.nav')@endif
@if(session('message'))<div class="notification is-info">{{ session('message') }}</div>@endif
@if($currentUser = auth()->user())@include('partials.admin.breadcrumbs')@endif
@yield('content')
<script src="/dist/js/admin.js" type="text/javascript"></script>
@hasSection('scripts')@yield('scripts')@endif

<script src="/editor/jquery.tinymce.min.js"></script>
<script src="/editor/tinymce.min.js"></script>

<script>
    tinymce.init({
        selector: '.editor',
        formats: {
            underline: { inline: 'span', styles: { 'text-decoration': 'underline' }, exact: true },
            strikethrough: { inline: 'span', styles: { 'text-decoration': 'line-through' }, exact: true }
        },
        height: 600,
        menubar: false,
        plugins: [
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table paste code wordcount',
            'advlist autolink lists link charmap print preview anchor'
        ],
        image_title: true,
        file_picker_types: 'image',
        file_picker_callback: function (cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*')

            input.onchange = function () {
                var file = this.files[0];

                var reader = new FileReader();
                reader.onload = function () {

                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    /* call the callback and populate the Title field with the file name */
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };

            input.click();
        },

        toolbar:
            'undo redo | formatselect | ' +
            'bold underline italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help | image | code '+
            'tiny_mce_wiris_formulaEditor,tiny_mce_wiris_formulaEditorChemistry',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

</script>


</body>
</html>
