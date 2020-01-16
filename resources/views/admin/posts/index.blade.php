@extends('admin.layouts.app')

@section('content')

<posts-index inline-template>
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
            @include('admin.posts.filters')
            <div class="table-responsive table-hover mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="sort" @click="sort($event, 'id')">@lang('admin.posts.columns.id')</th>
                            <th>@lang('admin.posts.columns.title')</th>
                            <th>@lang('admin.posts.columns.navigation_id')</th>
                            <th>@lang('admin.posts.columns.created_at')</th>
                            <th>@lang('admin.posts.columns.published')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in paginatedData.data">
                            <td>@{{ item.id }}</td>
                            <td>@{{ item.title }}</td>
                            <td>@{{ item.navigation.title }}</td>
                            <td>@{{ item.created_at }}</td>
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
</posts>

@endsection
