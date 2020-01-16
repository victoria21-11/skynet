@extends('admin.layouts.app')

@section('content')

<packages-index inline-template>
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
            @include('admin.packages.filters')
            <div class="table-responsive table-hover mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="sort" @click="sort($event, 'id')">@lang('admin.packages.columns.id')</th>
                            <th>@lang('admin.packages.columns.title')</th>
                            <th>@lang('admin.packages.columns.name')</th>
                            <th>@lang('admin.packages.columns.hd_channels_count')</th>
                            <th>@lang('admin.packages.columns.channels_count')</th>
                            <th>@lang('admin.packages.columns.price')</th>
                            <th>@lang('admin.packages.columns.extra')</th>
                            <th>@lang('admin.packages.columns.published')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in paginatedData.data">
                            <td>@{{ item.id }}</td>
                            <td>@{{ item.title }}</td>
                            <td>@{{ item.name }}</td>
                            <td>@{{ item.hd_channels_count }}</td>
                            <td>@{{ item.channels_count }}</td>
                            <td>@{{ item.price }}</td>
                            <td>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" :id="'extra_' + item.id" v-model="item.extra">
                                    <label class="custom-control-label" :for="'extra_' + item.id"></label>
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
</packages>

@endsection
