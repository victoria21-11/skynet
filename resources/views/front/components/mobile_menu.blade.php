<div class="mobile_menu col-12">
    <div class="row">
        @foreach($navigation as $tree)
        <div class="col-4">
            {{ $tree->section->title }}
        </div>
        @endforeach
    </div>
    <div class="">
        @foreach($navigation as $tree)
            @foreach($tree->childrenTrees as $item)
            <div>
                <div class="bg-white mobile_menu_item text-success">
                    {{ $item->section->title }}
                </div>
                @foreach($item->childrenTrees as $item)
                <div class="bg-secondary mobile_menu_item">
                    {{ $item->section->title }}
                </div>
                @endforeach
            </div>
            @endforeach
        @endforeach
    </div>
</div>
