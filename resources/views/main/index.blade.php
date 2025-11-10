@extends('template.base')

@section('content')
    
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($cvs as $cv)
    <div class="col">
        <div class="card shadow-sm" style="min-height: 500px;">
            

            <svg aria-label="Placeholder: Thumbnail" class="bd-placeholder-img card-img-top"
                height="225" preserveAspectRatio="xMidYMid slice" role="img" width="100%"
                xmlns="http://www.w3.org/2000/svg"
                style="background-image: url('{{ $cv->getPath() }}');
                       background-size: contain;
                       background-position: center center;
                       background-repeat: no-repeat;">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c11"></rect>
                <text x="5%" y="30%" fill="#000000"
                    dy=".3em" style="font-weight: bold; font-size: 1.5rem;">{{ $cv->name }}</text>
                <text x="5%" y="50%" fill="#000000"
                    dy=".3em" style="font-weight: bold; font-size: 1.5rem;">{{ $cv->surname }}</text>
            </svg>

            <div class="card-body d-flex flex-column">
                <div class="card-content flex-grow-1">
                    <p class="card-text">
                        {{ $cv->name }} {{ $cv->surname }}
                    </p>
                    <p class="card-text">
                        {{ $cv->email }}
                    </p>
                    <p class="card-text">
                        {{ $cv->tel }}
                    </p>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('cv.show', $cv->id) }}" class="btn btn-sm btn-outline-secondary">View</a>
                        <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                    </div>
                    <small class="text-body-secondary">{{ $cv->avg_grade }}</small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection