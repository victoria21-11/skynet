<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.equipments.columns.title',
                'model' => 'filters.title',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.equipments.columns.price',
                'model' => 'filters.price',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.equipments.columns.installment',
                'model' => 'filters.installment',
                'filter' => true,
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.equipments.columns.installment_period',
                'model' => 'filters.installment_period',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.equipments.columns.published',
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
