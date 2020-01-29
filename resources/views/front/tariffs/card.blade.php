<div class="card card_default-item mb-3">
    <div class="card-header">
        <div class="row justify-content-between align-items-center flex-nowrap no-gutters">
            <div class="col-auto">
                Тариф {{ $group->title }}
            </div>
            @if($group->rebate)
                <div class="col-auto ml-auto">
                    <div class="rebate d-flex align-items-center flex-nowrap">
                        <div class="rebate_content">
                            <svg height="40" width="10">
                                <polygon points="0 0 0 40 10 20" class="triangle" fill="#FFFFFF" />
                            </svg>
                            Акция
                        </div>
                        <img class="rebate_icon" src="{{ $group->getFirstMediaUrl('icon') }}" alt="">
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="">
                <div class="speed unit_grid py-1 px-3">
                    <div class="">
                        100
                    </div>
                    <div class="unit_container">
                        <div class="unit">
                            Мбит
                        </div>
                        <div class="">
                            сек
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="unit_grid py-1 px-3">
                    <div class="">
                        {{ $group->preview_price }}
                    </div>
                    <div class="unit_container">
                        <div class="unit">
                            руб
                        </div>
                        <div class="">
                            мес
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            Дополнительные опции
        </div>
        <div class="">
            {{ $group->description }}
        </div>
    </div>
    @component('front.components.likes', [
        'item' => $group
    ])
        @slot('url')
            #
        @endslot
    @endcomponent
</div>
