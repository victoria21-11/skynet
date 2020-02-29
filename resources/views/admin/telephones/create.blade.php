@extends('layouts.admin.app')

@section('content')

<telephones-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.telephones.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.editor', [
                'lang' => 'admin.telephones.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.telephones.columns.price',
                'model' => 'form.price',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.telephones.columns.price_urban',
                'model' => 'form.price_urban',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.telephones.columns.price_mobile',
                'model' => 'form.price_mobile',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.telephones.columns.price_landline',
                'model' => 'form.price_landline',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.telephones.columns.min_per_month',
                'model' => 'form.min_per_month',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.telephones.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</telephones-create>
@endsection
