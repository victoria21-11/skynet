@extends('admin.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        {{ $title }}
    </div>
    <div class="card-body">
        @foreach($tree as $item)
            <navigation :border="false" :data="{{ $item }}"></navigation>
        @endforeach
    </div>
</div>

@endsection
