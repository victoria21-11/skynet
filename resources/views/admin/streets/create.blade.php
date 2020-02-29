@extends('layouts.admin.app')

@section('content')

<streets-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.streets.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.streets.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</streets-create>
@endsection
