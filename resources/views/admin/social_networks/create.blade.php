@extends('layouts.admin.app')

@section('content')

<social-networks-create inline-template>
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
                'lang' => 'admin.social_networks.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent

            @component('components.admin.text', [
                'lang' => 'admin.social_networks.columns.link',
                'model' => 'form.link',
            ])
            @endcomponent

            @component('components.admin.boolean', [
                'lang' => 'admin.social_networks.columns.published',
                'model' => 'form.published',
            ])
            @endcomponent

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="store">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</social-networks-create>
@endsection
