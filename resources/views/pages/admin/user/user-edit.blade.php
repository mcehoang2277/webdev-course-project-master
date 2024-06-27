@extends('layouts.admin.admin')

@section('contents')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end">
                <a href="{{route('admin.user.detail', ['id' => $user->_id])}}">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-profile rounded-circle mb-2"
                             src=" https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile.svg"
                             alt="Logo"/>
                    </div>
                    <div class="col-md-9">
                        <form id="form-submit" action="{{route('admin.user.update', ['id' => $user->_id])}}"
                              method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    placeholder="Enter username"
                                    value="{{$user->name}}"
                                    required
                                >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input
                                    type="text"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    id="phone"
                                    name="phone"
                                    placeholder="Enter user phonenumber"
                                    value="{{$user->phone}}"
                                    required
                                    disabled
                                >
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    placeholder="Enter user email"
                                    value="{{$user->email}}"
                                    required
                                    disabled
                                >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select class="form-control @error('role') is-invalid @enderror" id="role" name="role"
                                        required>
                                    <option {{$user->role === 'user' ? 'selected': ''}} value="user">User
                                    </option>
                                    <option {{$user->role === 'admin' ? 'selected': ''}} value="admin">Admin
                                    </option>
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div>
                                <button type="button" data-toggle="modal" data-target="#confirmModal"
                                        class="btn btn-success">Submit
                                </button>
                            </div>
                        </form>
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
    <script>
        $(document).ready(function () {
            $('#btn-submit').click(function () {
                $('#form-submit').submit();
            });
        });
    </script>
@endsection
