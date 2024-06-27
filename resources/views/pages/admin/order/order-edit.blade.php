@extends('layouts.admin.admin')

@section('custome-styles')
    <link
        href="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet">
@endsection

@section('contents')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            <strong>Success!</strong>
            <span>{{ session('success') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end">
                <a href="{{ route('admin.order.detail', ['id' => $order->_id]) }}">Back</a>
            </div>
            <div class="card-body">
                <h2 class="text-primary font-weight-bold">Order #{{ $order->order_code }}</h2>
                <p>Order created date: {{ $order->created_at }}</p>
                <div class="order-detail row gap-6">
                    <div class="detail-cus-info col-md-6">
                        <div class="detail-info detail-phone">
                            <p>Phone number</p>
                            <p class="text-black">{{ $order->customer['phone'] }}</p>
                        </div>
                        <div class="detail-info detail-name">
                            <p>Customer name</p>
                            <p>{{ $order->customer['name'] }}</p>
                        </div>
                        <div class="detail-info detail-address">
                            <p>Customer address</p>
                            <p>{{ $order->address }}</p>
                        </div>
                    </div>
                    <form id="form-submit" class="col-md-6"
                        action="{{ route('admin.order.update', ['id' => $order->_id]) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="detail-status-info flex-wrap">
                            <div class="detail-info detail-status">
                                <p>Order payment method</p>
                                <p class="text-black">{{ $order->payment_method }}</p>
                            </div>
                            <div class="detail-status">
                                <div class="form-group">
                                    <label for="status">Order status</label>
                                    <select class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status" required>
                                        <option {{ $order->status === 'pending' ? 'selected' : '' }} value="pending">
                                            Pending
                                        </option>
                                        <option {{ $order->status === 'progress' ? 'selected' : '' }} value="progress">In
                                            progress
                                        </option>
                                        <option {{ $order->status === 'delivered' ? 'selected' : '' }} value="delivered">
                                            Delivered
                                        </option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="detail-payment">
                                <div class="form-group">
                                    <label for="payment_status">Order payment status</label>
                                    <select class="form-control @error('payment_status') is-invalid @enderror"
                                        id="payment_status" name="payment_status" required>
                                        <option {{ $order->payment_status === 'not paid' ? 'selected' : '' }}
                                            value="not paid">
                                            Not paid yet
                                        </option>
                                        <option {{ $order->payment_status === 'paid' ? 'selected' : '' }} value="paid">
                                            Paid
                                        </option>
                                    </select>
                                    @error('payment_status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive detail-table">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Category</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Sub total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    <th>{{ $item['category'] }}</th>
                                    <td>{{ $item['quantity'] }}</td>
                                    <td>{{ number_format($item['price'], 0, ',', ',') }} VNĐ</td>
                                    <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', ',') }} VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="detail-footer d-flex justify-content-between flex-wrap">
                    <div class="detail-footer_left">
                        <a class="btn btn-info" href="{{ route('admin.order') }}">Back</a>
                        <button type="button" data-toggle="modal" data-target="#confirmModal"
                            class="btn btn-success">Submit
                        </button>
                    </div>
                    <div class="detail-footer_right">
                        <p class="text-danger font-weight-bold fs-1">Total:
                            <span>{{ number_format($order->total_price, 0, ',', ',') }} VNĐ</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModal">Are you sure to update?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Update" below if you want to make this change.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="btn-submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custome-scripts')
    <script
        src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}">
    </script>
    <script
        src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}">
    </script>
    <script src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/demo/datatables-demo.js') }}">
    </script>

    <script>
        $(document).ready(function() {
            $('#btn-submit').click(function() {
                $('#form-submit').submit();
            });
        });
    </script>
@endsection
