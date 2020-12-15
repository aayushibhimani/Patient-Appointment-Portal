@extends('layouts.app')

@section('content')

<!-- Page Content -->
<div class="content my-5">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-8 offset-md-2">

                <!-- Register Content -->
                <div class="account-content">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-6 login-left">
                            <img src="assets/img/login-banner.png" class="img-fluid" alt="Doccure Register">
                        </div>
                        <div class="col-md-12 col-lg-6 pb-2 login-right">
                            <div class="login-header">
                                <h3>Register</h3>
                            </div>

                            <!-- Register Form -->
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="col-form-label text-md-right">{{ __('Type') }}</label>
                                    <div>
                                        <select name="role" id="role" required autocomplete="off"
                                            class="form-control @error('role') is-invalid @enderror">
                                            <option value="Patient">Patient</option>
                                            <option value="Doctor">Doctor</option>
                                        </select>

                                        @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email"
                                        class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone"
                                        class="col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                    <div>
                                        <input id="mobile_no" type="mobile_no"
                                            class="form-control @error('mobile_no') is-invalid @enderror"
                                            name="mobile_no" value="{{ old('mobile_no') }}" required
                                            autocomplete="mobile_no">

                                        @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password"
                                        class="col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm"
                                        class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div>
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary btn-block btn-lg">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                    @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">Already have an account?</a>
                                    @endif

                                </div>
                            </form>
                            <!-- /Register Form -->

                        </div>
                    </div>
                </div>
                <!-- /Register Content -->

            </div>
        </div>

    </div>

</div>
<!-- /Page Content -->

@endsection