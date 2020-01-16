<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.news.columns.title',
                'model' => 'filters.title',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.date_filter', [
                'lang' => 'admin.news.columns.created_at',
                'model' => 'filters.created_at',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.news.columns.published',
                'model' => 'filters.published',
                'filter' => true,
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
