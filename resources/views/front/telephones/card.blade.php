<div class="card card_default-item">
    <div class="card-header">
        {{ $item->title }}
    </div>
    <div class="card-body">
        <div class="d-flex">
            <div class="">
                <div class="badge badge-success">
                    @if($item->price_urban)
                    {{ $item->price_urban }}
                    @else
                    {{ $item->min_per_month }}
                    @endif
                </div>
                <div class="badge badge-secondary">
                    {{ $item->price_mobile }}
                </div>
            </div>
            <div class="ml-auto">
                <span class="h1">
                    {{ $item->price }}
                </span>
                руб/мес
            </div>
        </div>
        <div class="">
            <div class="">
                Звонки на городские номера - @if($item->price_urban){{ $item->price_urban }} руб/мес@else{{ $item->min_per_month }} мин/мес@endif
            </div>
            <div class="">
                Звонки на мобильные номера - {{ $item->price_mobile }} руб/мес
            </div>
        </div>
        <hr>
        <div class="">
            Городской номер - {{ $item->price_landline }} руб.
        </div>
    </div>
    @component('front.components.likes', [
        'item' => $item
    ])
        @slot('url')
            #
        @endslot
    @endcomponent
</div>
