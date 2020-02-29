<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
@component('admin.components.text', [
    'lang' => 'admin.layouts.columns.id',
    'model' => 'filters.id',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('admin.components.text', [
    'lang' => 'admin.layouts.columns.name',
    'model' => 'filters.name',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('admin.components.text', [
    'lang' => 'admin.layouts.columns.title',
    'model' => 'filters.title',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('admin.components.textarea', [
    'lang' => 'admin.layouts.columns.markup',
    'model' => 'filters.markup',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('admin.components.date', [
    'lang' => 'admin.layouts.columns.created_at',
    'model' => 'filters.created_at',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('admin.components.date', [
    'lang' => 'admin.layouts.columns.updated_at',
    'model' => 'filters.updated_at',
])
@endcomponent
</div>

        <div class="col-auto align-self-end">
            <button type="button" class="btn btn-warning mb-3" @click="clearFilters">@lang('admin.clear')</button>
        </div>
        <div class="col-auto align-self-end">
            <button type="button" class="btn btn-primary mb-3" @click="getData">@lang('admin.search')</button>
        </div>
    </div>
</div>
