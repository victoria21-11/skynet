<div class="form-group">
    <label for="">@lang($lang)</label>
    <input type="text" class="form-control" v-model="{{ $model }}" @if($readonly ?? false)readonly @endif>
</div>
@if($readonly ?? false)
<div class="alert alert-warning">
    @lang('admin.programmer_help')
</div>
@endif
