@extends('front.layouts.app')

@section('content')

<div class="card mb-3">
    <div class="card-header">
        {{ $tree->section->title }}
    </div>
    <div class="card-body">
        {!! html_entity_decode($tree->section->description) !!}
        @foreach ($components as $key => $row)
            <div class="{{ $row['item'] }}">
                @foreach ($row['items'] as $key => $item)
                    <div class="{{ $item['item'] }}">
                        @foreach ($item['components'] ?? [] as $component)
                            @component($component['path'], [
                                'params' => $component['params']
                            ])

                            @endcomponent
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>

<div class="row">
    {{-- @foreach($navigation->posts as $post)
    <div class="col-lg-4">
    @include('front.posts.card', [
        'post' => $post
    ])
    </div>
    @endforeach --}}
</div>

@endsection
