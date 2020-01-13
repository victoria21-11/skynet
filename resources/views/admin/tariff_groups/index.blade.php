@extends('admin.layouts.app')

@section('content')

<tariff-groups-index inline-template>
    <div class="card">
        <div class="card-header">
            {{ $title }}
        </div>
        <div class="card-body">
            <div class="mb-3">
                <a :href="url + '/create'" role="button" class="btn btn-success">
                    <i class="fas fa-plus"></i>
                    @lang('admin.create')
                </a>
            </div>
            @include('admin.tariff_groups.filters')
            <div class="table-responsive table-hover mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('admin.tariff_groups.columns.id')</th>
                            <th>@lang('admin.tariff_groups.columns.tariff_type_id')</th>
                            <th>@lang('admin.tariff_groups.columns.title')</th>
                            <th>@lang('admin.tariff_groups.columns.rebate')</th>
                            <th>@lang('admin.tariff_groups.columns.published')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in paginatedData.data">
                            <td>@{{ item.id }}</td>
                            <td>@{{ item.bill_tariff_id }}</td>
                            <td>@{{ item.title }}</td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" :id="'rebate_' + item.id" v-model="item.rebate">
                                    <label class="custom-control-label" :for="'rebate_' + item.id"></label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" :id="'published_' + item.id" v-model="item.published">
                                    <label class="custom-control-label" :for="'published_' + item.id"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-nowrap">
                                    <a :href="url + '/' + item.id + '/edit'" role="button" class="btn btn-primary mx-1">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger mx-1" @click="remove(item.id)">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <b-pagination
                v-model="paginatedData.current_page"
                @change="getData"
                :total-rows="paginatedData.total"
                :per-page="paginatedData.per_page"
            ></b-pagination>
        </div>
    </div>
</tariff-groups>

@endsection
