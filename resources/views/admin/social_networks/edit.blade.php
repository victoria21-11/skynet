@extends('admin.layouts.app')

@section('content')

<social-networks-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            @component('admin.components.fileupload', [
                'model' => 'form.icon',
                'media' => $media['icon']
            ])
            @endcomponent

            @component('admin.components.text', [
                'lang' => 'admin.social_networks.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('admin.components.boolean', [
                'lang' => 'admin.social_networks.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</social-networks-edit>
@endsection
