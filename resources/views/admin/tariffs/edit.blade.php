@extends('admin.layouts.app')

@section('content')

<tariffs-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.tariffs.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.tariffs.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.tariffs.columns.bill_tariff_id',
                'model' => 'form.bill_tariff_id',
            ])
            @endcomponent

            @component('admin.components.select', [
                'lang' => 'admin.tariffs.columns.tariff_group_id',
                'model' => 'form.tariff_group_id',
                'options' => App\Models\TariffGroup::get(),
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.tariffs.columns.period',
                'model' => 'form.period',
            ])
            @endcomponent

            @component('admin.components.select', [
                'lang' => 'admin.tariffs.columns.period_type_id',
                'model' => 'form.period_type_id',
                'options' => App\Models\PeriodType::get(),
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.tariffs.columns.price',
                'model' => 'form.price',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.tariffs.columns.rebate',
                'model' => 'form.rebate',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.tariffs.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</tariffs-edit>
@endsection
