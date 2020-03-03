@extends('layouts.admin.app')

@section('content')

<layouts-edit :data="{{ $data }}" inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">

            @component('components.admin.text', [
                'lang' => 'admin.layouts.columns.name',
                'model' => 'form.name',
            ])
            @endcomponent
            @component('components.admin.text', [
                'lang' => 'admin.layouts.columns.title',
                'model' => 'form.title',
            ])
            @endcomponent
            @component('components.admin.textarea', [
                'lang' => 'admin.layouts.columns.markup',
                'model' => 'form.markup',
            ])
            @endcomponent

            <div class="form-group">
                <label for="">@lang('admin.layouts.columns.layout_filename')</label>
                <select class="form-control" v-model="form.layout_filename">
                    @foreach($files as $file)
                    <option value="{{ $file['basename'] }}">{{ $file['basename'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="text-right">
                <button type="button" class="btn btn-success" @click="update">@lang('admin.save')</button>
            </div>
        </div>
    </div>
</layouts-edit>
@endsection
