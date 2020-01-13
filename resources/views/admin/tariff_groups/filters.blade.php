<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
            @component('admin.components.input', [
                'lang' => 'admin.tariff_groups.columns.title',
                'model' => 'filters.title',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.select', [
                'lang' => 'admin.tariff_groups.columns.tariff_type_id',
                'model' => 'filters.tariff_type_id',
                'options' => App\Models\TariffType::get()
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.tariff_groups.columns.rebate',
                'model' => 'filters.rebate',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.tariff_groups.columns.published',
                'model' => 'filters.published',
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
