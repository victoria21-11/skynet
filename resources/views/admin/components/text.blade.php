<div class="form-group">
    <label for="">@lang($lang)</label>
    <input type="text" class="form-control" v-model="{{ $model }}" @if($readonly ?? false)readonly @endif>
</div>
@include('admin.components.error', [
    'model' => str_replace('form.', '', $model)
])
@if($readonly ?? false)
<div class="alert alert-warning">
    @lang('admin.programmer_help')
</div>
@endif
