@extends('admin.layouts.app')

@section('content')

<questions-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.questions.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.textarea', [
                'lang' => 'admin.questions.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.select', [
                'lang' => 'admin.questions.columns.question_type_id',
                'model' => 'form.question_type_id',
                'options' => $questionTypes,
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.questions.columns.general',
                'model' => 'form.general',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.questions.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</questions-create>
@endsection
