@extends('admin.master')
@section('admin')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="d-flex justify-content-between">
                            <h2 class="page-title">
                                Brand List
                            </h2>
                            <a href="{{ route('create.brand') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i> Add Brand</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card">
                    <div class="card-body">
                        <div id="table-default" class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th><button class="table-sort" data-sort="sort-name">ID</button></th>
                                        <th><button class="table-sort" data-sort="sort-city">Name</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Slug</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Image</button></th>
                                        <th><button class="table-sort" data-sort="sort-date">Action</button></th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @foreach ($brands as $key=>$brand)
                                        <tr>
                                            <td class="sort-name">{{ $key++ }}</td>
                                            <td class="sort-city">{{ $brand->name }}</td>
                                            <td class="sort-type">{{ $brand->slug }}</td>
                                            <td class="sort-type">
                                               <img src="{{asset('public/images/Brand/'.$brand->image)}}" width="60px";height='60px' alt="Image">
                                            </td>
                                            <td class="sort-score">
                                                <a href="{{ route('edit.brand',$brand->id) }}" class="btn btn-primary"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ route('delete.brand',$brand->id) }}" id="delete" class="btn btn-danger"><i
                                                        class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
