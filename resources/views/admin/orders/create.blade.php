@extends('admin.layouts.app')

@section('content')

<orders-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">

            @component('admin.components.text', [
    'lang' => 'admin.orders.columns.id',
    'model' => 'form.id',
])
@endcomponent
@component('admin.components.text', [
    'lang' => 'admin.orders.columns.title',
    'model' => 'form.title',
])
@endcomponent
@component('admin.components.text', [
    'lang' => 'admin.orders.columns.description',
    'model' => 'form.description',
])
@endcomponent
@component('admin.components.text', [
    'lang' => 'admin.orders.columns.phone',
    'model' => 'form.phone',
])
@endcomponent
@component('admin.components.text', [
    'lang' => 'admin.orders.columns.street',
    'model' => 'form.street',
])
@endcomponent
@component('admin.components.text', [
    'lang' => 'admin.orders.columns.house',
    'model' => 'form.house',
])
@endcomponent
@component('admin.components.text', [
    'lang' => 'admin.orders.columns.tariff_id',
    'model' => 'form.tariff_id',
])
@endcomponent
@component('admin.components.text', [
    'lang' => 'admin.orders.columns.house_id',
    'model' => 'form.house_id',
])
@endcomponent
@component('admin.components.date', [
    'lang' => 'admin.orders.columns.created_at',
    'model' => 'form.created_at',
])
@endcomponent
@component('admin.components.date', [
    'lang' => 'admin.orders.columns.updated_at',
    'model' => 'form.updated_at',
])
@endcomponent

            
            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</orders-create>
@endsection
