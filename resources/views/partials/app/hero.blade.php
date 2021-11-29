
<section class="hero is-primary {{ $class ?? '' }}">
    <div class="hero-body">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <h1 class="title">{{ $title }}</h1>
                    <h2 class="subtitle">{{ $description }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.app.errors')


@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
<script>
$(document).ready(function(){
      $('.slider').slider();
    });

</script>

@endsection
