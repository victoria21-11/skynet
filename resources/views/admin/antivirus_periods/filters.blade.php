<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
            @component('components.admin.text', [
                'lang' => 'admin.antivirus_periods.columns.price',
                'model' => 'filters.price',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.select', [
                'lang' => 'admin.antivirus_periods.columns.antivirus_id',
                'model' => 'filters.antivirus_id',
                'options' => $antiviruses
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.text', [
                'lang' => 'admin.antivirus_periods.columns.period',
                'model' => 'filters.period',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.select', [
                'lang' => 'admin.antivirus_periods.columns.period_type_id',
                'model' => 'filters.period_type_id',
                'options' => $periodTypes
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.boolean', [
                'lang' => 'admin.antivirus_periods.columns.published',
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
