@extends('admin.layouts.app')

@section('content')

<equipments-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.equipments.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.textarea', [
                'lang' => 'admin.equipments.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('components.admin.textarea', [
                'lang' => 'admin.equipments.columns.extra',
                'model' => 'form.extra',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.equipments.columns.price',
                'model' => 'form.price',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.equipments.columns.installment',
                'model' => 'form.installment',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.equipments.columns.installment_period',
                'model' => 'form.installment_period',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.equipments.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</equipments-edit>
@endsection
