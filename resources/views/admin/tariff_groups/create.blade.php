@extends('admin.layouts.app')

@section('content')

<tariff-groups-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.input', [
                'lang' => 'admin.tariffs.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.tariffs.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.select', [
                'lang' => 'admin.tariffs.columns.tariff_type_id',
                'model' => 'form.tariff_type_id',
                'options' => App\Models\TariffType::get(),
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
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</tariff-groups-create>
@endsection
