<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
        @component('components.admin.text', [
            'lang' => 'admin.components.columns.name',
            'model' => 'filters.name',
        ])
        @endcomponent
        </div>
        <div class="col-lg-4">
        @component('components.admin.text', [
            'lang' => 'admin.components.columns.title',
            'model' => 'filters.title',
        ])
        @endcomponent
        </div>
        <div class="col-lg-4">
        @component('components.admin.text', [
            'lang' => 'admin.components.columns.path',
            'model' => 'filters.path',
        ])
        @endcomponent
        </div>

        <div class="col-auto align-self-end">
            <button type="button" class="btn btn-warning mb-3" @click="clearFilters">@lang('admin.clear')</button>
        </div>
        <div class="col-auto align-self-end">
            <button type="button" class="btn btn-primary mb-3" @click="getData">@lang('admin.search')</button>
        </div>
    </div>
</div>
