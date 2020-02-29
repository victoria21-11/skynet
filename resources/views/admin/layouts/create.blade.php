@extends('layouts.admin.app')

@section('content')

<layouts-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">

            @component('admin.components.text', [
    'lang' => 'admin.layouts.columns.id',
    'model' => 'form.id',
])
@endcomponent
@component('admin.components.text', [
    'lang' => 'admin.layouts.columns.name',
    'model' => 'form.name',
])
@endcomponent
@component('admin.components.text', [
    'lang' => 'admin.layouts.columns.title',
    'model' => 'form.title',
])
@endcomponent
@component('admin.components.textarea', [
    'lang' => 'admin.layouts.columns.markup',
    'model' => 'form.markup',
])
@endcomponent
@component('admin.components.date', [
    'lang' => 'admin.layouts.columns.created_at',
    'model' => 'form.created_at',
])
@endcomponent
@component('admin.components.date', [
    'lang' => 'admin.layouts.columns.updated_at',
    'model' => 'form.updated_at',
])
@endcomponent

            
            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</layouts-create>
@endsection
