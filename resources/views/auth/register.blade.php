@extends('layouts.app')

@section('title', 'Register')

@section('content')

<div class="card shadow">

    <div class="card-body p-4">

        <div class="text-center mb-4">

            <div class="d-flex align-items-center justify-content-center">

                @if($appSettings->logo)
                    <img
                        src="{{ asset('storage/' . $appSettings->logo) }}"
                        alt="Logo"
                        width="45"
                        height="45"
                        class="me-3 rounded">
                @endif

                 <h3 class="mb-0">Create Account</h3>

            </div>
            

            <p class="text-muted">
                Register to access {{ $appSettings->app_name }}
            </p>

        </div>

        <form method="POST" action="{{ route('register.store') }}">

            @csrf

            <div class="mb-3">

                <label class="form-label">

                    Name

                </label>

                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    placeholder="Enter your name">

                @error('name')

                    <div class="invalid-feedback">

                        {{ $message }}

                    </div>

                @enderror

            </div>

            <div class="mb-3">

                <label class="form-label">

                    Email

                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    placeholder="Enter your email">

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

            <div class="mb-3">

                <label class="form-label">

                    Confirm Password

                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    placeholder="Confirm password">

            </div>

            <button
                type="submit"
                class="btn btn-primary w-100">

                Register

            </button>

        </form>

        <hr>

        <div class="text-center">

            Already have an account?

            <a href="{{ route('login') }}">

                Login

            </a>

        </div>

    </div>

</div>

@endsection