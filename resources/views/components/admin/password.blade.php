<div class="form-group">
    <label for="">@lang($lang)</label>
    <input type="password" class="form-control" v-model="{{ $model }}" @if($readonly ?? false)readonly @endif>
</div>
@include('components.admin.error', [
    'model' => str_replace('form.', '', str_replace('filters.', '', $model))
])
@if($readonly ?? false)
<div class="alert alert-warning">
    @lang('admin.programmer_help')
</div>
@endif
