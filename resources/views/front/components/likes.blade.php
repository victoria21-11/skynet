<div class="card-footer">
    <div class="d-flex justify-content-between align-items-center">
        <div class="">
            <like is-disabled="{{ $item->current_user_likes_count }}"
                item-id="{{ $item->id }}"
                :type="'{{ $item->className }}'"
                count="{{ $item->likes_count }}" />
        </div>
        <div class="">
            <a href="{{ $url }}" class="more">Подробнее</a>
        </div>
    </div>
</div>
