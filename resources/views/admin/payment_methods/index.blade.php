@extends('admin.layouts.app')

@section('content')

<payment-methods-index inline-template>
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
            @include('admin.payment_methods.filters')
            <div class="table-responsive table-hover mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="sort" @click="sort($event, 'id')">@lang('admin.payment_methods.columns.id')</th>
                            <th>@lang('admin.payment_methods.columns.title')</th>
                            <th>@lang('admin.payment_methods.columns.link')</th>
                            <th>@lang('admin.payment_methods.columns.alternative')</th>
                            <th>@lang('admin.payment_methods.columns.published')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in paginatedData.data">
                            <td>@{{ item.id }}</td>
                            <td>@{{ item.title }}</td>
                            <td>@{{ item.link }}</td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" :id="'alternative_' + item.id" @change="update(item)" v-model="item.alternative">
                                    <label class="custom-control-label" :for="'alternative_' + item.id"></label>
                                </div>
                            </td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" :id="'published_' + item.id" @change="update(item)" v-model="item.published">
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
</payment_methods>

@endsection
