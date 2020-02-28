@extends('admin.layouts.app')

@section('content')

<components-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">

            @component('components.admin.text', [
    'lang' => 'admin.components.columns.id',
    'model' => 'form.id',
])
@endcomponent
@component('components.admin.text', [
    'lang' => 'admin.components.columns.name',
    'model' => 'form.name',
])
@endcomponent
@component('components.admin.text', [
    'lang' => 'admin.components.columns.title',
    'model' => 'form.title',
])
@endcomponent
@component('components.admin.textarea', [
    'lang' => 'admin.components.columns.description',
    'model' => 'form.description',
])
@endcomponent
@component('components.admin.text', [
    'lang' => 'admin.components.columns.path',
    'model' => 'form.path',
])
@endcomponent
@component('components.admin.date', [
    'lang' => 'admin.components.columns.created_at',
    'model' => 'form.created_at',
])
@endcomponent
@component('components.admin.date', [
    'lang' => 'admin.components.columns.updated_at',
    'model' => 'form.updated_at',
])
@endcomponent

            
            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</components-create>
@endsection
