@extends('admin.layouts.app')

@section('content')

<antiviruses-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.fileupload', [
                'model' => 'form.preview',
                'media' => $media['preview']
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.antiviruses.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.editor', [
                'lang' => 'admin.antiviruses.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.antiviruses.columns.extra',
                'model' => 'form.extra',
            ])
            @endcomponent

            @component('admin.components.select', [
                'lang' => 'admin.antiviruses.columns.antivirus_type_id',
                'model' => 'form.antivirus_type_id',
                'options' => App\Models\AntivirusType::get()
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.antiviruses.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</antiviruses-edit>
@endsection
