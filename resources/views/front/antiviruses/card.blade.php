<div class="card card_default-item mb-3">
    <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                {{ $antivirus->title }}
            </div>
            <div class="">
                {{ $antivirus->getMinPrice() }}
            </div>
        </div>
    </div>
    <div class="card-body">
        {{ $antivirus->preview_description }}
    </div>
    @component('front.components.likes', [
        'item' => $antivirus
    ])
        @slot('url')
            {{ $antivirus->type->getUrl() }}
        @endslot
    @endcomponent
</div>
