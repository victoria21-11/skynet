<div class="card mb-3">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <div class="">
                Тариф {{ $group->title }}
            </div>
            @if($group->rebate)
            <div class="">
                Акция
            </div>
            @endif
        </div>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <div class="">
                Скорость
            </div>
            <div class="">
                {{ $group->tariffs->first()->price }}
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
