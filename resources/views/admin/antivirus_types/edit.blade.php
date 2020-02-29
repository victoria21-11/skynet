@extends('layouts.admin.app')

@section('content')

<antivirus-types-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.antivirus_types.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.textarea', [
                'lang' => 'admin.antivirus_types.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.textarea', [
                'lang' => 'admin.antivirus_types.columns.preview_description',
                'model' => 'form.preview_description',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.antivirus_types.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</antivirus-types-edit>
@endsection
