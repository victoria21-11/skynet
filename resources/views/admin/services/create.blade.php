@extends('admin.layouts.app')

@section('content')

<services-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.services.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.services.columns.url',
                'model' => 'form.url',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.services.columns.preview_description',
                'model' => 'form.preview_description',
            ])
            @endcomponent

            @component('admin.components.editor', [
                'lang' => 'admin.services.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.services.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</services-create>
@endsection
