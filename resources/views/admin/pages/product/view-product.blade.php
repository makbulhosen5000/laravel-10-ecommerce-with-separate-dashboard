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
                                product List
                            </h2>
                            <a href="{{ route('create.product') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>
                                Create Product</a>
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
                                        <th><button class="table-sort" data-sort="sort-type">price</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Discount</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Thumbnail</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Categtory</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Brand</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Status</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Featured</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Stock</button></th>
                                        <th><button class="table-sort" data-sort="sort-date">Action</button></th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td class="sort-name">{{ $key++ }}</td>
                                            <td class="sort-city">{{ $product->name }}</td>
                                            <td class="sort-type">{{ $product->slug }}</td>
                                            <td class="sort-type">{{ $product->price }}</td>
                                            <td class="sort-type">{{ $product->discount }}</td>
                                            <td class="sort-type">
                                                <img src="{{ url('storage/uploads/', $product->thumbnail) }}"
                                                    width="60px";height='60px' alt="product">
                                            </td>
                                            <td class="sort-type">{{ $product->category->name }}</td>
                                            <td class="sort-type">{{ $product->brand->name }}</td>
                                            <td class="sort-type">{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td class="sort-type">{{ $product->featured == 1 ? 'true' : 'false' }}</td>
                                            <td class="sort-type">{{ $product->stock }}</td>

                                            <td class="sort-score">
                                                <a href="{{ route('edit.product', $product->id) }}"
                                                    class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="{{ route('delete.product', $product->id) }}" id="delete"
                                                    class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle align-text-top"
                                                        data-bs-toggle="dropdown">
                                                        Actions
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                         <a class="dropdown-item"
                                                            href="{{ route('product.gallery',$product->id) }}">
                                                            Add Images
                                                        </a>
                                                    </div>
                                                </div>
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
