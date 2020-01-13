@extends('admin.layouts.app')

@section('content')

<equipments-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.equipments.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.equipments.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.equipments.columns.extra',
                'model' => 'form.extra',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.equipments.columns.price',
                'model' => 'form.price',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.equipments.columns.installment',
                'model' => 'form.installment',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.equipments.columns.installment_period',
                'model' => 'form.installment_period',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.equipments.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</equipments-create>
@endsection
