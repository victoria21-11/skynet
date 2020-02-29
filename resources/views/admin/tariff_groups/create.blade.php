@extends('layouts.admin.app')

@section('content')

<tariff-groups-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">

            @component('components.admin.fileupload', [
                'model' => 'form.icon',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.tariff_groups.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.tariff_groups.columns.preview_price',
                'model' => 'form.preview_price',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.tariff_groups.columns.published',
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
