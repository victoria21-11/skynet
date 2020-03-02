<div class="card">
    <div class="card-header">
        {{ $params['title'] }}
    </div>
    <div class="card-body">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Номер для связи">
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" value="" id="agreement">
            <label class="form-check-label" for="agreement">
                {{ $params['agreement'] }}
            </label>
        </div>
        <button type="button" class="btn btn-success btn-block">{{ $params['buttonTitle'] }}</button>
    </div>
</div>
