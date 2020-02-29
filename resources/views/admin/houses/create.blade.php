@extends('layouts.admin.app')

@section('content')

<houses-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('components.admin.text', [
                'lang' => 'admin.houses.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.search_select', [
                'lang' => 'admin.houses.columns.street_id',
                'model' => 'form.street',
                'columnName' => 'title',
                'url' => '/admin/streets/search',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.houses.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</houses-create>
@endsection
