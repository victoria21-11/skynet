<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.orders.columns.id',
    'model' => 'filters.id',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.orders.columns.title',
    'model' => 'filters.title',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.orders.columns.description',
    'model' => 'filters.description',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.orders.columns.phone',
    'model' => 'filters.phone',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.orders.columns.street',
    'model' => 'filters.street',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.orders.columns.house',
    'model' => 'filters.house',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.orders.columns.tariff_id',
    'model' => 'filters.tariff_id',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.text', [
    'lang' => 'admin.orders.columns.house_id',
    'model' => 'filters.house_id',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.date', [
    'lang' => 'admin.orders.columns.created_at',
    'model' => 'filters.created_at',
])
@endcomponent
</div>
<div class="col-lg-4">
@component('components.admin.date', [
    'lang' => 'admin.orders.columns.updated_at',
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
