<div class="form-group">
    <label for="">@lang($lang)</label>
    <select class="form-control" v-model="{{ $model }}">
        @if(isset($filter))
        <option value="" selected>@lang('admin.no_matter')</option>
        @endif
        <option value="1">@lang('admin.yes')</option>
        <option value="0">@lang('admin.no')</option>
    </select>
</div>
