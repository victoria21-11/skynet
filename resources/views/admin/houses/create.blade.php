@extends('admin.layouts.app')

@section('content')

<houses-create inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.input', [
                'lang' => 'admin.houses.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.search_select', [
                'lang' => 'admin.houses.columns.street_id',
                'model' => 'form.street_id',
                'options' => App\Models\Street::get(),
            ])
            @endcomponent

            @component('admin.components.boolean', [
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
