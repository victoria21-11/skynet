<div class="form-group">
    <label for="">@lang($lang)</label>
    <select class="form-control" v-model="{{ $model }}">
        @foreach($options as $item)
        <option value="{{ $item->id }}">{{ $item->title }}</option>
        @endforeach
    </select>
</div>
