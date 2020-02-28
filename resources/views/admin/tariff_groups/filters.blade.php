<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
            @component('components.admin.text', [
                'lang' => 'admin.tariff_groups.columns.title',
                'model' => 'filters.title',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.select', [
                'lang' => 'admin.tariff_groups.columns.tariff_type_id',
                'model' => 'filters.tariff_type_id',
                'options' => $tariffTypes
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.boolean', [
                'lang' => 'admin.tariff_groups.columns.rebate',
                'model' => 'filters.rebate',
                'filter' => true,
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.boolean', [
                'lang' => 'admin.tariff_groups.columns.published',
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
