@extends('admin.layouts.app')

@section('content')

<packages-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.name',
                'model' => 'form.name',
            ])
            @endcomponent

            @component('admin.components.editor', [
                'lang' => 'admin.packages.columns.descriprion',
                'model' => 'form.descriprion',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.hd_channels_count',
                'model' => 'form.hd_channels_count',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.channels_count',
                'model' => 'form.channels_count',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.price',
                'model' => 'form.price',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.packages.columns.extra',
                'model' => 'form.extra',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.packages.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</packages-create>
@endsection
