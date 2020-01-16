<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.telephones.columns.title',
                'model' => 'filters.title',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.telephones.columns.price',
                'model' => 'filters.price',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.telephones.columns.price_urban',
                'model' => 'filters.price_urban',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.telephones.columns.price_mobile',
                'model' => 'filters.price_mobile',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.telephones.columns.price_landline',
                'model' => 'filters.price_landline',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.telephones.columns.min_per_month',
                'model' => 'filters.min_per_month',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.telephones.columns.published',
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
