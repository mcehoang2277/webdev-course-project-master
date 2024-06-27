@extends('layouts.admin.admin')

@section('custome-styles')
    <link
        href="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}"
        rel="stylesheet">
@endsection

@section('contents')
    @if(session()->has('success'))
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
                <p class="m-0 font-weight-bold text-primary">User Data</p>
            </div>
            <div class="card-body">
                <x-table
                    :field1="'Id'"
                    :field2="'Name'"
                    :field3="'Email'"
                    :field4="'Role'"
                    :field5="'Phone'"
                >
                    @foreach ($users as $user)
                        <x-table-row
                            :data1="$user->_id"
                            :data2="$user->name"
                            :data3="$user->email"
                            :data4="$user->role"
                            :data5="$user->phone"
                            :detailUrl="route('admin.user.detail', ['id' => $user->_id])"
                        />
                    @endforeach
                </x-table>
            </div>
        </div>
    </div>

@endsection

@section('custome-scripts')
    <script
        src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script
        src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script
        src="{{ asset('https://startbootstrap.github.io/startbootstrap-sb-admin-2/js/demo/datatables-demo.js') }}"></script>
@endsection
