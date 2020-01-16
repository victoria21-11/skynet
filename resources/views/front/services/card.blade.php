<div class="card card_default-item mb-3">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            {{ $item->title }}
        </div>
    </div>
    <div class="card-body">
        {{ $item->preview_description }}
    </div>
    @component('front.components.likes', [
        'item' => $item
    ])
        @slot('url')
            {{ $item->getUrl() }}
        @endslot
    @endcomponent
</div>
