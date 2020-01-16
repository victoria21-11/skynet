<div class="card mb-3">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div class="">
                {{ $item->title }}
            </div>
            <div class="">
                {{ $item->price }}
                руб/мес
            </div>
        </div>
    </div>
    <div class="card-body">
        <img src="{{ $item->preview }}" class="img-fluid" alt="">
        @foreach($item->tariffGroups ?? [] as $group)
        <span class="badge badge-primary">{{ $group->title }}</span>
        @endforeach
    </div>
    @component('front.components.likes', [
        'item' => $item
    ])
        @slot('url')
            {{ url('packages/' . $item->id) }}
        @endslot
    @endcomponent
</div>
