@extends('admin.layouts.app')

@section('content')

<tariff-types-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.tariff_types.columns.title',
                'model' => 'form.title',
                'readonly' => true,
            ])
            @endcomponent

            @component('components.admin.textarea', [
                'lang' => 'admin.tariff_types.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</tariff-types-edit>
@endsection
