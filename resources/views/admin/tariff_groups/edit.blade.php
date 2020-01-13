@extends('admin.layouts.app')

@section('content')

<tariff-groups-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.text', [
                'lang' => 'admin.tariff_groups.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.tariff_groups.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</tariff-groups-edit>
@endsection
