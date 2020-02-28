@extends('admin.layouts.app')

@section('content')

<components-index inline-template>
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
            @include('admin.components.filters')
            <div class="table-responsive table-hover mb-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@lang('admin.components.columns.id')</th>
<th>@lang('admin.components.columns.name')</th>
<th>@lang('admin.components.columns.title')</th>
<th>@lang('admin.components.columns.description')</th>
<th>@lang('admin.components.columns.path')</th>
<th>@lang('admin.components.columns.created_at')</th>
<th>@lang('admin.components.columns.updated_at')</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in paginatedData.data">
                            <td>@{{ item.id }}</td>
<td>@{{ item.name }}</td>
<td>@{{ item.title }}</td>
<td>@{{ item.description }}</td>
<td>@{{ item.path }}</td>
<td>@{{ item.created_at }}</td>
<td>@{{ item.updated_at }}</td>

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
</components-index>

@endsection
