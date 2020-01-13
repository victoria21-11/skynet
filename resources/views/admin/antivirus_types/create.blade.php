@extends('admin.layouts.app')

@section('content')

<antivirus-types-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.antivirus_types.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.antivirus_types.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.antivirus_types.columns.preview_description',
                'model' => 'form.preview_description',
            ])
            @endcomponent
            
            @component('admin.components.boolean', [
                'lang' => 'admin.antivirus_types.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</antivirus-types-create>
@endsection
