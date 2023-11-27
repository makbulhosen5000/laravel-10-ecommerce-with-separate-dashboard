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
                                order List
                            </h2>
                            <form action="{{ route('product.search') }}" method="GET">
                                @csrf
                                <div>
                                    <div class="input-group">
                                        <input type="text" name="search" class=""
                                            placeholder="Search...">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>

                            </form>
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
                                        <th><button class="table-sort" data-sort="sort-type">Email</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Phone</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Address</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Product Title</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">price</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Qty</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Image</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Payment Status</button></th>
                                        <th><button class="table-sort" data-sort="sort-type">Delivery Status</button></th>
                                        <th><button class="table-sort" data-sort="sort-date">IsDelivered</button></th>
                                        <th><button class="table-sort" data-sort="sort-date">IsPrint</button></th>
                                        <th><button class="table-sort" data-sort="sort-date">Mail Send</button></th>
                                    </tr>
                                </thead>
                                <tbody class="table-tbody">
                                    @forelse ($orders as $key => $order)
                                        <tr>
                                            <td class="sort-name">{{ $key++ }}</td>
                                            <td class="sort-city">{{ $order->name }}</td>
                                            <td class="sort-type">{{ $order->email }}</td>
                                            <td class="sort-type">{{ $order->phone }}</td>
                                            <td class="sort-type">{{ $order->address }}</td>
                                            <td class="sort-type">{{ $order->product_title }}</td>
                                            <td class="sort-type">${{ $order->price }}</td>
                                            <td class="sort-type">{{ $order->quantity }}</td>
                                            <td class="sort-type">
                                                <img src="{{ url('storage/uploads/', $order->image) }}"
                                                    width="60px";height='60px' alt="order">
                                            </td>
                                            <td class="sort-type">
                                                @if ($order->payment_status == 'PAID')
                                                    <button type="button"
                                                        class="btn btn-success">{{ $order->payment_status }}</button>
                                                @else
                                                    <button type="button"
                                                        class="btn btn-warning">{{ $order->payment_status }}</button>
                                                @endif
                                            </td>
                                            @if ($order->delivery_status == 'processing')
                                                <td class="sort-type">
                                                    <button type="button"
                                                        class="btn btn-warning">{{ $order->delivery_status }}</button>
                                                </td>
                                            @else
                                                <td class="sort-type"><button type="button"
                                                        class="btn btn-success">{{ $order->delivery_status }}</button></td>
                                            @endif


                                            <td class="sort-score">
                                                @if ($order->delivery_status == 'processing')
                                                    <a href="{{ route('deliver.order', $order->id) }}"
                                                        class="btn btn-primary"
                                                        onclick="return confirm('Are You Sure To Delivered The Order!')">Delevered</a>
                                                @else
                                                    <button type="button" class="btn btn-success" disabled>Order
                                                        Dilevered</button>
                                                @endif

                                            </td>
                                            <td class="sort-score">
                                                <a href="{{ route('order.print.pdf', $order->id) }}"
                                                    class="btn btn-warning">Print</a>


                                            </td>
                                            <td> <a href="{{ route('send.email', $order->id) }}"
                                                    class="btn btn-primary">Send Email</a></td>
                                            
                                        </tr>
                                        @empty
                                        <div class="text-center">
                                            <span class="text-red fw-bold">NO DATA FOUND</span>
                                        </div>
                                          
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
