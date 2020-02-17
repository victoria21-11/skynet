@extends('admin.layouts.app')

@section('content')

<antivirus-periods-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.antivirus_periods.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.textarea', [
                'lang' => 'admin.antivirus_periods.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            @component('admin.components.select', [
                'lang' => 'admin.antivirus_periods.columns.antivirus_id',
                'model' => 'form.antivirus_id',
                'options' => $antiviruses
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.antivirus_periods.columns.price',
                'model' => 'form.price',
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.antivirus_periods.columns.period',
                'model' => 'form.period',
            ])
            @endcomponent

            @component('admin.components.select', [
                'lang' => 'admin.antivirus_periods.columns.period_type_id',
                'model' => 'form.period_type_id',
                'options' => $periodTypes
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.antivirus_periods.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</antivirus-periods-edit>
@endsection
