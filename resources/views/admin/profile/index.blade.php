@extends('layouts.admin.app')

@section('content')

<profile-index :data="{{ $user }}" inline-template>
    <div class="">
        <div class="card mb-3">
            <div class="card-header">
                @lang('admin.profile')
            </div>
            <div class="card-body">
                @component('components.admin.fileupload', [
                    'model' => 'form.avatar',
                    'media' => $media['avatar']
                ])
                @endcomponent

                @component('components.admin.text', [
                    'lang' => 'admin.users.columns.name',
                    'model' => 'form.name',
                ])
                @endcomponent

                @component('components.admin.text', [
                    'lang' => 'admin.users.columns.email',
                    'model' => 'form.email',
                ])
                @endcomponent

                @component('components.admin.text', [
                    'lang' => 'admin.users.columns.first_name',
                    'model' => 'form.first_name',
                ])
                @endcomponent

                @component('components.admin.text', [
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

                @component('components.admin.password', [
                    'lang' => 'admin.users.columns.old_password',
                    'model' => 'form.old_password',
                ])
                @endcomponent

                @component('components.admin.password', [
                    'lang' => 'admin.users.columns.password',
                    'model' => 'form.password',
                ])
                @endcomponent

                @component('components.admin.password', [
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
