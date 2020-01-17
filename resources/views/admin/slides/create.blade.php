@extends('admin.layouts.app')

@section('content')

<slides-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">

            @component('admin.components.fileupload', [
                'model' => 'form.image',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.slides.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.slides.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.slides.columns.link_title',
                'model' => 'form.link_title',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.slides.columns.link',
                'model' => 'form.link',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.slides.columns.order',
                'model' => 'form.order',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.slides.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</slides-create>
@endsection
