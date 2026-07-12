@extends('layouts.app')

@section('title', 'Login')

@section('content')

<div class="card shadow">

    <div class="card-body p-4">

        <div class="text-center mb-4 mt-4">

            <div class="d-flex align-items-center justify-content-center">

                @if($appSettings->logo)
                    <img
                        src="{{ asset('storage/' . $appSettings->logo) }}"
                        alt="Logo"
                        width="45"
                        height="45"
                        class="me-3 rounded">
                @endif

                 <h3 class="mb-0">Login</h3>

            </div>

            {{-- <h3>Login</h3> --}}

            <p class="text-muted">
                Sign in to your {{ $appSettings->app_name }} account
            </p>

        </div>

        <form method="POST" action="{{ route('login.authenticate') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    placeholder="Enter email">

                @error('email')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Enter password">

                @error('password')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="mb-3 form-check">

                <input
                    type="checkbox"
                    class="form-check-input"
                    id="remember"
                    name="remember"
                    value="1"
                    {{ old('remember') ? 'checked' : '' }}>

                <label
                    class="form-check-label"
                    for="remember">

                    Remember Me

                </label>

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                Login

            </button>

        </form>

        <hr>

        <div class="text-center">

            Don't have an account?

            <a href="{{ route('register') }}">

                Register

            </a>

        </div>

    </div>

</div>

@endsection