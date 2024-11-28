@extends('backend.layouts.auth_layout')

{{-- Meta tag section --}}
@section('description', Config::get('metatags.signup.description'))
@section('keywords', Config::get('metatags.signup.keywords'))
@section('pagetitle', Config::get('metatags.signup.pagetitle'))
{{-- End Meta tag section --}}

{{-- CSS section --}}
@section('css-content')
@endsection
{{-- End CSS section --}}

@section('page-content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6 col-xl-5">
        <div class="card mt-4 card-bg-fill">
            <div class="card-body p-4">
                <div class="text-center mt-2">
                    <h5 class="text-primary">Create New Account</h5>
                    <p class="text-muted">Get your free Velzon account now</p>
                </div>
                <div class="p-2 mt-4">
                    <form class="needs-validation" id="sign-up-form" method="POST" action="{{ route('create-account') }}">
                        @csrf
                        <div class="row mb-3">
                            <!-- First Name -->
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required>
                                <div class="invalid-feedback">Please enter your first name.</div>
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" required>
                                <div class="invalid-feedback">Please enter your last name.</div>
                            </div>
                        </div>
                        <div class="row mb-3">

                            <!-- Username -->
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter username" required>
                                <div class="invalid-feedback">Please enter a username.</div>
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                                <div class="invalid-feedback">Please enter a valid email address.</div>
                            </div>


                        </div>

                        <div class="row mb-3">
                            <!-- Password -->
                            <div class="col-md-6">

                                <div class="position-relative auth-pass-inputgroup">
                                    <input type="password" class="form-control pe-5 password-input" id="password" name="password" placeholder="Enter password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon material-shadow-none" type="button" id="password-addon">
                                        <i class="ri-eye-fill align-middle"></i>
                                    </button>
                                    <div class="invalid-feedback">Password must meet the specified requirements.</div>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-6">

                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                                <div class="invalid-feedback">Passwords must match.</div>
                            </div>
                        </div>
                        <!-- Password Requirements -->
                        <div id="password-contain" class="p-3 bg-light mb-2 rounded">
                            <h5 class="fs-13">Password must contain:</h5>
                            <p id="pass-length" class="invalid fs-12 mb-2">Minimum <b>8 characters</b></p>
                            <p id="pass-lower" class="invalid fs-12 mb-2">At least <b>one lowercase</b> letter (a-z)</p>
                            <p id="pass-upper" class="invalid fs-12 mb-2">At least <b>one uppercase</b> letter (A-Z)</p>
                            <p id="pass-number" class="invalid fs-12 mb-0">At least <b>one number</b> (0-9)</p>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="mb-4">
                            <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the Velzon <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a>.</p>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-4">
                            <button class="btn btn-success w-100" type="submit">Sign Up</button>
                        </div>

                        <!-- Social Media Signup -->
                        <div class="mt-4 text-center">
                            <div class="signin-other-title">
                                <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-facebook-fill fs-16"></i></button>
                                <button type="button" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-google-fill fs-16"></i></button>
                                <button type="button" class="btn btn-dark btn-icon waves-effect waves-light"><i class="ri-github-fill fs-16"></i></button>
                                <button type="button" class="btn btn-info btn-icon waves-effect waves-light"><i class="ri-twitter-fill fs-16"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End card body -->
        </div>
        <!-- End card -->

        <div class="mt-4 text-center">
            <p class="mb-0">Already have an account? <a href="{{ route('sign-in') }}" class="fw-semibold text-primary text-decoration-underline"> Sign In </a></p>
        </div>
    </div>
</div>
<!-- End row -->
@endsection

@section('js-content')
<script src="{{ asset('backend/js/customjs/signup.js') }}"></script>

<script>
jQuery(document).ready(function () {
    Signup.init();
});
</script>
@endsection
