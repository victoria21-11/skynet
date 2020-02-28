@extends('admin.layouts.app')

@section('content')

<antiviruses-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.fileupload', [
                'model' => 'form.preview',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.antiviruses.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.editor', [
                'lang' => 'admin.antiviruses.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.textarea', [
                'lang' => 'admin.antiviruses.columns.extra',
                'model' => 'form.extra',
            ])
            @endcomponent

            @component('components.admin.select', [
                'lang' => 'admin.antiviruses.columns.antivirus_type_id',
                'model' => 'form.antivirus_type_id',
                'options' => $antivirusTypes
            ])
            @endcomponent

            @component('components.admin.search_select', [
                'lang' => 'admin.tags.title',
                'model' => 'form.tags',
                'url' => '/admin/tags/search',
                'tags' => true,
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.antiviruses.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</antiviruses-create>
@endsection
