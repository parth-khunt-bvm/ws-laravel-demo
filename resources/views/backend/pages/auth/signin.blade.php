@extends('backend.layouts.auth_layout')

{{-- Meta tag section --}}
@section('description', Config::get('metatags.signin.description'))
@section('keywords', Config::get('metatags.signin.keywords'))
@section('pagetitle', Config::get('metatags.signin.pagetitle'))
{{-- End Meta tag section --}}

{{-- CSS section --}}
@section('css-content')
<style>
    .card {
        background:  #f3e6e6;
    }
</style>
@endsection
{{-- End CSS section --}}

@section('page-content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4 card-bg-fill">

            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">Welcome Back !</h5>
                    <p class="text-muted">Sign in to continue to Velzon.</p>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('danger'))
                    <div class="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif

                <div class="p-2 mt-4">
                    <form action="{{ route('sign-in-check') }}" method="POST" id="sign-in-form">@csrf

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                        </div>

                        <div class="mb-3">
                            <div class="float-end">
                                <a href="{{ route('password-reset') }}" class="text-muted">Forgot password?</a>
                            </div>
                            <label class="form-label" for="password-input">Password</label>
                            <div class="position-relative auth-pass-inputgroup mb-3">
                                <input type="password" class="form-control pe-5 password-input" placeholder="Enter password" id="password" name="password">
                                <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="auth-remember-check" name="auth-remember">
                            <label class="form-check-label" for="auth-remember-check">Remember me</label>
                        </div>

                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">Sign In</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="mt-4 text-center">
            <p class="mb-0">Don't have an account ? <a href="{{ route('sign-up') }}" class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
        </div>

    </div>
</div>
<!-- end row -->
@endsection
{{-- js section --}}
@section('js-content')
<script src="{{ asset('backend/js/customjs/signin.js') }}"></script>

<script>
jQuery(document).ready(function () {
    Login.init();
});
</script>
@endsection
