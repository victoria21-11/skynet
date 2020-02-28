<div class="mb-3">
    <div class="row">
        <div class="col-lg-4">
            @component('components.admin.text', [
                'lang' => 'admin.questions.columns.title',
                'model' => 'filters.title',
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.select', [
                'lang' => 'admin.questions.columns.question_type_id',
                'model' => 'filters.question_type_id',
                'options' => $questionTypes
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.boolean', [
                'lang' => 'admin.questions.columns.general',
                'model' => 'filters.general',
                'filter' => true,
            ])
            @endcomponent
        </div>
        <div class="col-lg-4">
            @component('components.admin.boolean', [
                'lang' => 'admin.questions.columns.published',
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
