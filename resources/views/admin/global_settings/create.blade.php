@extends('layouts.admin.app')

@section('content')

<global-settings-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.fileupload', [
                'model' => 'form.image',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.global_settings.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.global_settings.columns.name',
                'model' => 'form.name',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.global_settings.columns.value',
                'model' => 'form.value',
            ])
            @endcomponent

            @component('components.admin.textarea', [
                'lang' => 'admin.global_settings.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.boolean', [
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
