@extends('admin.layouts.app')

@section('content')

<profile-index :data="{{ $user }}" inline-template>
    <div class="">
        <div class="card mb-3">
            <div class="card-header">
                @lang('admin.profile')
            </div>
            <div class="card-body">
                @component('admin.components.text', [
                    'lang' => 'admin.users.columns.name',
                    'model' => 'form.name',
                ])
                @endcomponent

                @component('admin.components.text', [
                    'lang' => 'admin.users.columns.email',
                    'model' => 'form.email',
                ])
                @endcomponent

                @component('admin.components.text', [
                    'lang' => 'admin.users.columns.first_name',
                    'model' => 'form.first_name',
                ])
                @endcomponent

                @component('admin.components.text', [
                    'lang' => 'admin.users.columns.last_name',
                    'model' => 'form.last_name',
                ])
                @endcomponent

                <div class="text-right">
                    <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Изменить пароль
            </div>
            <div class="card-body">

                @component('admin.components.password', [
                    'lang' => 'admin.users.columns.old_password',
                    'model' => 'form.old_password',
                ])
                @endcomponent

                @component('admin.components.password', [
                    'lang' => 'admin.users.columns.password',
                    'model' => 'form.password',
                ])
                @endcomponent

                @component('admin.components.password', [
                    'lang' => 'admin.users.columns.password_confirmation',
                    'model' => 'form.password_confirmation',
                ])
                @endcomponent

                <div class="text-right">
                    <button type="button" class="btn btn-success" @click="updatePassword">@lang('admin.save')</button>
                </div>
            </div>

        </div>
    </div>
</profile-index>

@endsection
