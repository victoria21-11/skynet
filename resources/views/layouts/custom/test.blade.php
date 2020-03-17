<div class="row mb-3">
    <div class="col-lg-4">
        @foreach ($components[0] as $component)@component($component['path'], ['params' => $component['params']])@endcomponent @endforeach
    </div>
    <div class="col-lg-8">
        @foreach ($components[1] as $component)@component($component['path'], ['params' => $component['params']])@endcomponent @endforeach
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-6">
        @foreach ($components[2] as $component)@component($component['path'], ['params' => $component['params']])@endcomponent @endforeach
    </div>
    <div class="col-lg-6">
        @foreach ($components[3] as $component)@component($component['path'], ['params' => $component['params']])@endcomponent @endforeach
    </div>
</div>
<div class="row mb-3">
    <div class="col-lg-8">
        @foreach ($components[4] as $component)@component($component['path'], ['params' => $component['params']])@endcomponent @endforeach
    </div>
    <div class="col-lg-4">
        @foreach ($components[5] as $component)@component($component['path'], ['params' => $component['params']])@endcomponent @endforeach
    </div>
</div>
