@extends('template.base')

@section('scripts')
<script src="https://kit.fontawesome.com/3aa61fcaf0.js" crossorigin="anonymous"></script>
@endsection

@section('content')

<header class="masthead" style="
    background-image: url('{{ route('image.view', $cv->id) }}');
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $cv->name }} {{ $cv->surname}}</h1>
                    <div class="meta">
                        Posted on {{ $cv->created_at->format('F d, Y') }}
                        @if($cv->updated_at != $cv->created_at)
                            , updated at {{ $cv->updated_at->format('F d, Y') }}
                        @endif
                    </div>
                    <div class="meta">
                        Average grade:
                        <h2 href="#!">{{ $cv->avg_grade }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p>{{ $cv->experience }}</p>
                <p>{{ $cv->education }}</p>
                <p>{{ $cv->skills }}</p>
            </div>
        </div>
    </div>
</article>
<footer class="border-top">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#!">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#!">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            <div class="small text-center text-muted fst-italic">Copyright &copy; {{ $year }} Francisco José Serrano Muñoz</div>
        </div>
    </div>
</footer>

@section('styles')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@endsection