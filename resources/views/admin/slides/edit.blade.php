@extends('layouts.admin.app')

@section('content')

<slides-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">

            @component('components.admin.fileupload', [
                'model' => 'form.image',
                'media' => $media['image']
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.slides.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.textarea', [
                'lang' => 'admin.slides.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.slides.columns.link_title',
                'model' => 'form.link_title',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.slides.columns.link',
                'model' => 'form.link',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.slides.columns.order',
                'model' => 'form.order',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.slides.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</slides-edit>
@endsection
