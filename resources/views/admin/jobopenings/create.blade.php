@extends('admin.layouts.app')

@section('content')

<jobopenings-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.input', [
                'lang' => 'admin.jobopenings.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.jobopenings.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.jobopenings.columns.requirements',
                'model' => 'form.requirements',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.jobopenings.columns.responsibilities',
                'model' => 'form.responsibilities',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.jobopenings.columns.conditions',
                'model' => 'form.conditions',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.jobopenings.columns.extra',
                'model' => 'form.extra',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.jobopenings.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</jobopenings-create>
@endsection
