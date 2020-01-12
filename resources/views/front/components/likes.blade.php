<div class="card-footer">
    <div class="d-flex justify-content-between align-items-center">
        <div class="">
            <button type="button"
                name="button"
                class="btn btn-link like"
                @if($item->is_my_like_exists)disabled @endif
                @click="like($event, '{{ $item->getClassName() }}', {{ $item->id }})">
                <i class="fas fa-heart"></i>
                <span class="likes_count" data-count="{{ $item->likes()->count() }}">
                    {{ $item->likes()->count() }}
                </span>
            </button>
        </div>
        <div class="">
            <a href="{{ $url }}">Подробнее</a>
        </div>
    </div>
</div>
