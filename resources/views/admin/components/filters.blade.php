<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.components.columns.id',
    'model' => 'filters.id',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.components.columns.name',
    'model' => 'filters.name',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.components.columns.title',
    'model' => 'filters.title',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.textarea', [
    'lang' => 'admin.components.columns.description',
    'model' => 'filters.description',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.components.columns.path',
    'model' => 'filters.path',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.date', [
    'lang' => 'admin.components.columns.created_at',
    'model' => 'filters.created_at',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.date', [
    'lang' => 'admin.components.columns.updated_at',
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
