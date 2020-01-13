@extends('admin.layouts.app')

@section('content')

<questions-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.input', [
                'lang' => 'admin.questions.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.questions.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.select', [
                'lang' => 'admin.questions.columns.question_type_id',
                'model' => 'form.question_type_id',
                'options' => App\Models\QuestionType::get(),
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.questions.columns.general',
                'model' => 'form.general',
            ])
            @endcomponent

            @component('admin.components.boolean', [
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
