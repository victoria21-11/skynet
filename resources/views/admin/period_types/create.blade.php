@extends('layouts.admin.app')

@section('content')

<period-types-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.period_types.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.period_types.columns.name',
                'model' => 'form.name',
            ])
            @endcomponent

            @component('components.admin.editor', [
                'lang' => 'admin.period_types.columns.description',
                'model' => 'form.description',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</period_types-create>
@endsection
