<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.title',
                'model' => 'filters.title',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.name',
                'model' => 'filters.name',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.hd_channels_count',
                'model' => 'filters.hd_channels_count',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.channels_count',
                'model' => 'filters.channels_count',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.text', [
                'lang' => 'admin.packages.columns.price',
                'model' => 'filters.price',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.packages.columns.extra',
                'model' => 'filters.extra',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('admin.components.boolean', [
                'lang' => 'admin.packages.columns.published',
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
