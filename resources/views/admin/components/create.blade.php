@extends('admin.layouts.app')

@section('content')

<components-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            <div class="alert alert-warning">
                @lang('admin.components.warning')
            </div>
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
            <params ref="params"></params>

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</components-create>
@endsection
