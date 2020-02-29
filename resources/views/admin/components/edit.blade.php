@extends('admin.layouts.app')

@section('content')

<components-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
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
            <params ref="params" :params="data.params"></params>

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</components-edit>
@endsection
