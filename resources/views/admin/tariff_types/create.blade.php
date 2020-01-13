@extends('admin.layouts.app')

@section('content')

<tariff-types-create inline-template>
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

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</tariff-types-create>
@endsection
