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
                                Mail Send To Customer
                            </h2>
                            {{-- <a href="{{ route('view.category') }}" class="btn btn-success">View Category</a> --}}
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
                            <form action="{{ route('send.user.email',$order->id) }}" method="POST" class="dropzone">
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
                                <label class="form-label"> Write Details</label>
                                <fieldset class="form-fieldset">
                                    <div class="mb-3">
                                        <label class="form-label required">Gretting</label>
                                        <input type="text" name="greeting" value="{{ old('greeting') }}"
                                            placeholder="enter greeting" class="form-control" autocomplete="off" required />
                                        <span class="text-danger">@error('greeting') is-invalid @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email FirstLine</label>
                                        <input type="text" name="firstline" value="{{ old('firstline') }}"
                                            placeholder="enter firstline" class="form-control" autocomplete="off" required />
                                        <span class="text-danger">@error('firstline') is-invalid @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Body</label>
                                        <input type="text" name="body" value="{{ old('body') }}"
                                            placeholder="enter greeting" class="form-control" autocomplete="off" required />
                                        <span class="text-danger">@error('body') is-invalid @enderror</span>
                                    </div>
                                     <div class="mb-3">
                                        <label class="form-label required">button Name</label>
                                        <input type="text" name="button" value="{{ old('button') }}"
                                            placeholder="enter any name for giving button name" class="form-control" autocomplete="off" required />
                                        <span class="text-danger">@error('button') is-invalid @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email URL</label>
                                        <input type="text" name="url" value="{{ old('url') }}"
                                            placeholder="Enter Your Website Link" class="form-control" autocomplete="off" required />
                                        <span class="text-danger">@error('url') is-invalid @enderror</span>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label required">Email Lastline</label>
                                        <input type="text" name="lastline" value="{{ old('lastline') }}"
                                            placeholder="enter last line" class="form-control" autocomplete="off" required />
                                        <span class="text-danger">@error('lastline') is-invalid @enderror</span>
                                    </div>
                                  
                                    <div>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
