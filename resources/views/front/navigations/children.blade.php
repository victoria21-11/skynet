@if($children->isNotEmpty())
<div class="navigation__children bg-success">
    <div class="container">
        <div class="card mb-3 bg-success">
            <div class="card-body">
                <div class="row">
                @foreach($children as $child)
                <div class="col-auto">
                    <a href="{{ url($child->pivot->url) }}">{{ $child->title }}</a>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif
