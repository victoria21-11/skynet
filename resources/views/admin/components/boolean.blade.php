<div class="form-group">
    <label for="">@lang($lang)</label>
    <select class="form-control" v-model="{{ $model }}">
        <option :value="true">Да</option>
        <option :value="false">Нет</option>
    </select>
</div>
