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
                                Create Product
                            </h2>
                            <a href="{{ route('view.product') }}" class="btn btn-success">View Product</a>
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
                            <form action="{{ route('store.product') }}" method="POST" id="image-upload" class="dropzone"  enctype="multipart/form-data">
                             
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row row-cards">
                                            <div class="col-md-12">
                                                <div class="mb-3">

                                                    <label class="form-label">Select
                                                        Thumbnail*</label>
                                                    <input type="file" name="thumbnail" value="{{ old('thumbnail') }}"
                                                        class="form-control dropify" data-show-remove="true">
                                                    <span class="text-danger">
                                                        @error('thumbnail')
                                                            is-invalid
                                                        @enderror
                                                    </span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" value="{{ old('name') }}"
                                                        class="form-control" placeholder="Product Name"autocomplete="off" />
                                                    <span class="text-danger">
                                                        @error('name')
                                                            is-invalid
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" name="price" value="{{ old('price') }}"
                                                        class="form-control" placeholder="Enter Price"autocomplete="off" />
                                                    <span class="text-danger">
                                                        @error('price')
                                                            is-invalid
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">


                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Discount</label>
                                                    <input type="number" name="discount" value="{{ old('discount') }}"
                                                        class="form-control"
                                                        placeholder="Enter Discount"autocomplete="off" />
                                                    <span class="text-danger">
                                                        @error('discount')
                                                            is-invalid
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label class="form-label">Stock</label>
                                                    <input type="text" name="stock" value="{{ old('stock') }}"
                                                        class="form-control" placeholder="stock" autocomplete="off" />
                                                </div>

                                            </div>
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <div class="mb-3">
                                                        <label class="form-label">Status*</label>
                                                        <select name="status" value="{{ old('status') }}" class="form-control">
                                                            <option value="1">Active
                                                            </option>
                                                            <option value="0">Inactive
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <span class="text-danger">
                                                        @error('status')
                                                            is-invalid
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Category*</label>
                                                    <select name="category_id" value="{{ old('category_id') }}" id=""
                                                        class="form-control">
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    <span class="text-danger">
                                                        @error('category_id')
                                                            is-invalid
                                                        @enderror
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Brand*</label>
                                                    <select name="brand_id" onload="{{ 'brand_id' }}" id=""
                                                        class="form-control">
                                                        @foreach ($brands as $brand)
                                                            <option value="{{ $brand->id }}">
                                                                {{ $brand->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                    <span class="text-danger">
                                                        @error('brand_id')
                                                            is-invalid
                                                        @enderror
                                                    </span>
                                                </div>

                                            </div>

                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">Short
                                                Description</label>
                                            <textarea id="tinymce-mytextarea" rows="5" value="{{ old('short_description') }}" name="short_description"
                                                placeholder="Enter short description"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Long
                                                    Description</label>
                                                <textarea id="tinymce-mytextarea" rows="5" value="{{ old('long_description') }}" name="long_description"
                                                    placeholder="Enter long description"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-footer text-end">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
