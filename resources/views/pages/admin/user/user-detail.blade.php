@extends('layouts.admin.admin')

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
                <a href="{{route('admin.user')}}">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 d-flex justify-content-center align-items-center">
                        <i class="fa-solid fa-user-secret" style="font-size: 10em; color: black;"></i>
                    </div>
                    <div class="col-md-9">
                        <h3 class="font-weight-bold text-primary">{{$user->name}}</h3>
                        <p>Email:
                            <span
                                class="font-weight-bold">{{$user->email}}
                            </span>
                        </p>
                        <p>Phone:
                            <span
                                class="font-weight-bold">{{$user->phone}}
                            </span>
                        </p>
                        <p>Role:
                            <span
                                class="font-weight-bold">{{$user->role}}
                            </span>
                        </p>
                        <p>Created At:
                            <span
                                class="font-weight-bold">{{$user->created_at}}
                            </span>
                        </p>
                        <p>Updated At:
                            <span
                                class="font-weight-bold">{{$user->updated_at}}
                            </span>
                        </p>
                        <div>
                            <a href="{{route('admin.user.edit', ['id' => $user->_id])}}"
                               class="btn btn-warning">Edit</a>
                            <a data-toggle="modal" data-target="#confirmModal" class="btn btn-danger">Delete</a>
                        </div>
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
                    <h5 class="modal-title" id="confirmModal">Are you sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you want to do this action.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{route('admin.user.delete', ['id' => $user->_id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="btn-submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
