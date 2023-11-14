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
                                Category List
                            </h2>
                            <a href="{{ route('create.category') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>  Add Category </a>
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
                                    @foreach ($categories as $key=>$cat)
                                        <tr>
                                            <td class="sort-name">{{ $key++ }}</td>
                                            <td class="sort-city">{{ $cat->name }}</td>
                                            <td class="sort-type">{{ $cat->slug }}</td>
                                            <td class="sort-type">
                                               <img src="{{asset('public/images/category/'.$cat->image)}}" width="60px";height='60px' alt="Image">
                                            </td>
                                            <td class="sort-score">
                                                <a href="{{ route('edit.category',$cat->id) }}" class="btn btn-primary"><i
                                                        class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ route('delete.category',$cat->id) }}" id="delete" class="btn btn-danger"><i
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
