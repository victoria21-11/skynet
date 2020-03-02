@php
$params = prepareParams($params);
@endphp
<div class="alert alert-warning">
    {{ $params['text'] }}
</div>
