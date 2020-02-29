@extends('layouts.admin.app')

@section('content')

<success-stories-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.fileupload', [
                'model' => 'form.employee',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.success_stories.columns.name',
                'model' => 'form.name',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.success_stories.columns.start_position',
                'model' => 'form.start_position',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.success_stories.columns.current_position',
                'model' => 'form.current_position',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.success_stories.columns.experience_years',
                'model' => 'form.experience_years',
            ])
            @endcomponent

            @component('components.admin.editor', [
                'lang' => 'admin.success_stories.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.success_stories.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</success-stories-create>
@endsection
