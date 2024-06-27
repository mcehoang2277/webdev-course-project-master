@extends('layouts.auth')

@section('content')
    <div class="container container-login">
        <div class="row">
            <div class="col-lg-10 col-xl-9 mx-auto">
                <div class="card flex-row my-5 border-0 shadow rounded-3 overflow-hidden login">
                    <div class="card-img-left d-none d-md-flex w-100">
                        <!-- Background image for card set in CSS! -->
                    </div>
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title mb-5 fw-light fs-2 auth-title text-start">
                            You must verify your email address, please check your email for a verification
                            link</h5>
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('verification.send') }}" method="post">
                            @csrf
                            <button class="btn btn-lg btn-primary btn-login fw-bold text-uppercase btn-auth" type="submit">
                                Resend Verification Email
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
