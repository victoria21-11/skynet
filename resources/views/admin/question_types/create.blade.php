@extends('admin.layouts.app')

@section('content')

<question-types-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.question_types.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.question_types.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.question_types.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</question-types-create>
@endsection
