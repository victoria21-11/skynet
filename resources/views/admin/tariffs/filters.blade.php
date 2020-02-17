<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.tariffs.columns.title',
                'model' => 'filters.title',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.tariffs.columns.bill_tariff_id',
                'model' => 'filters.bill_tariff_id',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.select', [
                'lang' => 'admin.tariffs.columns.tariff_type_id',
                'model' => 'filters.tariff_type_id',
                'options' => $tariffTypes
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.select', [
                'lang' => 'admin.tariffs.columns.tariff_group_id',
                'model' => 'filters.tariff_group_id',
                'options' => $tariffGroups
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.tariffs.columns.period',
                'model' => 'filters.period',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.select', [
                'lang' => 'admin.tariffs.columns.period_type_id',
                'model' => 'filters.period_type_id',
                'options' => $periodTypes
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.tariffs.columns.price',
                'model' => 'filters.price',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.tariffs.columns.rebate',
                'model' => 'filters.rebate',
                'filter' => true,
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.tariffs.columns.published',
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
