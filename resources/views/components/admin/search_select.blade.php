<div class="form-group">
    <label for="">@lang($lang)</label>
    <search-select url="{{ $url }}"
        v-model="{{ $model }}"
        @if(isset($columnName))column-name="{{ $columnName }}" @endif
        @if(isset($tags)):tags="{{ $tags }}" @endif
    ></search-select>
</div>
