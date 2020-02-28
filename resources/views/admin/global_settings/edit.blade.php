@extends('admin.layouts.app')

@section('content')

<global-settings-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">

            @component('components.admin.fileupload', [
                'model' => 'form.image',
                'media' => $media['image']
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
                'readonly' => true,
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
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</global-settings-edit>
@endsection
