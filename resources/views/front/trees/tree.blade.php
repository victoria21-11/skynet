@if($tree)
<div class="navigation__children bg-success">
    <div class="container">
        <div class="py-2 mb-3">
            <div class="row">
            @foreach($tree as $item)
            <div class="col-auto">
                <a href="{{ url($item->url) }}">{{ $item->section->title }}</a>
            </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endif
