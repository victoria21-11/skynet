@extends('admin.layouts.app')

@section('content')

<posts-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.posts.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.editor', [
                'lang' => 'admin.posts.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.posts.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</posts-edit>
@endsection
