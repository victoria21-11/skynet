<div class="card card_default-item mb-3">
    <div class="card-header">
        {{ $post->title }}
    </div>
    <div class="card-body">
        {{ $post->description }}
    </div>
    @component('front.components.likes', [
        'item' => $post
    ])
        @slot('url')
            {{ url('posts/' . $post->id) }}
        @endslot
    @endcomponent
</div>
