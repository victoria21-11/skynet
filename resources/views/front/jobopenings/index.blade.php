@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                Требуются
            </div>
            <div class="card-body">
                @foreach($jobopenings as $jobopening)
                <a href="{{ url('/about/job_openings/' .$jobopening->id) }}" class="h3 border w-100 d-block p-3">{{ $jobopening->title }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                {{ $navigation->title }}
            </div>
            <div class="card-body">
                {!! $navigation->description !!}
            </div>
        </div>
    </div>
</div>

@endsection
