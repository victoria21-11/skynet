@extends('admin.layouts.app')

@section('content')

<news-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.news.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.editor', [
                'lang' => 'admin.news.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.news.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</news-edit>
@endsection
