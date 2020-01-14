@extends('admin.layouts.app')

@section('content')

<payment-methods-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.payment_methods.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.editor', [
                'lang' => 'admin.payment_methods.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.payment_methods.columns.link',
                'model' => 'form.link',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.payment_methods.columns.alternative',
                'model' => 'form.alternative',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.payment_methods.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</payment_methods-edit>
@endsection
