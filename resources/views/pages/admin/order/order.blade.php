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
                <p class="m-0 font-weight-bold text-primary">Order Data</p>
            </div>
            <div class="card-body">
                <x-table :field1="'Order Code'" :field2="'Customer name'" :field3="'Total Price'" :field4="'Order Status'" :field5="'Payment Status'">
                    @foreach ($orders as $order)
                        <x-table-row :data1="$order->order_code" :data2="$order->customer['name']" :data3="$order->total_price" :data4="$order->status"
                            :data5="$order->payment_status" :detailUrl="route('admin.order.detail', ['id' => $order->_id])" />
                    @endforeach
                </x-table>
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
@endsection
