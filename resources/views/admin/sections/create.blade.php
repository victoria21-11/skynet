@extends('layouts.admin.app')

@section('content')

<sections-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            <layout ref="layout"
                :components="{{ $components }}"
                :layouts="{{ json_encode($layouts) }}">
                @foreach ($layouts as $value)
                    <div class="layouts" data-id="{{ $value['id'] }}">
                        {!! $value['content'] !!}
                    </div>
                @endforeach
            </layout>
            @component('components.admin.fileupload', [
                'model' => 'form.tree_icon',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.sections.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.editor', [
                'lang' => 'admin.sections.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.sections.columns.url',
                'model' => 'form.url',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.sections.columns.view',
                'model' => 'form.view',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.sections.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</sections-create>
@endsection
