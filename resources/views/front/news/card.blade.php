<div class="card card_default-item mb-3">
    <div class="card-header">
        {{ $news->title }}
    </div>
    <div class="card-body">
        <div class="">
            {{ $news->created_at }}
        </div>
        {{ $news->description }}
    </div>
    @component('front.components.likes', [
        'item' => $news
    ])
        @slot('url')
            {{ url('news/' . $news->id) }}
        @endslot
    @endcomponent
</div>
