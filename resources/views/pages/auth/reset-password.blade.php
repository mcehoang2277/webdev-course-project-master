@extends('layouts.auth')

@section('content')
    <div class="container container-login">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden login">
                    <div class="card-img-left d-none d-md-flex">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-1 auth-title">Reset password</h5>
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}" />
                            <div class="form-floating mb-3">
                                <input type="email"
                                    class="form-control
                                       @error('email') is-invalid @enderror"
                                    id="floatingInputEmail" value="{{ $request->email }}" name="email" required>
                                <label for="floatingInputEmail">Email address</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password"
                                    class="form-control
                                       @error('password') is-invalid @enderror"
                                    id="floatingPassword" placeholder="Password" name="password" required>
                                <label for="floatingPassword">Password</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPasswordConfirm"
                                    placeholder="Confirm Password" name="password_confirmation" required>
                                <label for="floatingPasswordConfirm">Confirm Password</label>
                            </div>
                            <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase btn-auth"
                                    type="submit">
                                    Submit
                                </button>
                            </div>
                            <div>
                                <a class="d-block text-center mt-3 small fs-5" href="{{ route('register') }}">
                                    Don't have an account ?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
