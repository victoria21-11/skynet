@extends('admin.layouts.app')

@section('content')

<payment-methods-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.payment_methods.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.editor', [
                'lang' => 'admin.payment_methods.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.payment_methods.columns.link',
                'model' => 'form.link',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.payment_methods.columns.alternative',
                'model' => 'form.alternative',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.payment_methods.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</payment_methods-create>
@endsection
