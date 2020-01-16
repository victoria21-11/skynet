@extends('admin.layouts.app')

@section('content')

@include('admin.components.breadcrumbs', [
    'name' => 'global_settings',
    'route' => 'create',
])

<global-settings-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.fileupload', [
                'model' => 'form.image',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.global_settings.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.global_settings.columns.name',
                'model' => 'form.name',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.global_settings.columns.value',
                'model' => 'form.value',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.global_settings.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.global_settings.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</global-settings-create>
@endsection
