<div class="card-footer">
    <div class="d-flex justify-content-between align-items-center">
        <div class="">
            <like is-disabled="{{ $item->is_my_like_exists }}"
                item-id="{{ $item->id }}"
                :type="'{{ $item->getClassName() }}'"
                count="{{ $item->likes()->count() }}" />
        </div>
        <div class="">
            <a href="{{ $url }}" class="more">Подробнее</a>
        </div>
    </div>
</div>
