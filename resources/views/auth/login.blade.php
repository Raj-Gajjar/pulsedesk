@extends('layouts.auth.app')

@section('title', 'Login')

@section('content')

<div class="pd-auth-wrap">

    {{-- Left branding panel --}}
    <div class="pd-auth-side">

        <div class="pd-brand">
            <div class="pd-brand-mark">
                @if($appSettings->logo)
                    <img src="{{ asset('storage/' . $appSettings->logo) }}" alt="Logo">
                @else
                    {{ Str::substr($appSettings->app_name, 0, 1) }}
                @endif
            </div>
            <div>
                <div class="pd-brand-name">{{ $appSettings->app_name }}</div>
                <div class="pd-brand-tag">Listen. Analyze. Improve.</div>
            </div>
        </div>

        <div class="pd-side-copy">
            <h2>Understand your customers, one response at a time.</h2>
            <p>
                Sign in to manage surveys, track responses, and turn feedback
                into decisions — all from one dashboard.
            </p>

            <div class="pd-stat-row">
                <div class="pd-stat-chip">
                    <div class="num">3,692</div>
                    <div class="label">Total Responses</div>
                </div>
                <div class="pd-stat-chip">
                    <div class="num">4.6★</div>
                    <div class="label">Avg. Rating</div>
                </div>
                <div class="pd-stat-chip">
                    <div class="num">256</div>
                    <div class="label">Total Clients</div>
                </div>
            </div>
        </div>

        <div class="pd-side-footer">
            &copy; {{ date('Y') }} {{ $appSettings->app_name }}. All rights reserved.
        </div>

    </div>

    {{-- Right form panel --}}
    <div class="pd-auth-main">

        <div class="pd-auth-card">

            <div class="pd-form-logo">
                @if($appSettings->logo)
                    <img src="{{ asset('storage/' . $appSettings->logo) }}" alt="Logo">
                @else
                    <div class="mark-fallback">{{ Str::substr($appSettings->app_name, 0, 1) }}</div>
                @endif
                <span>{{ $appSettings->app_name }}</span>
            </div>

            <h3>Welcome back</h3>
            <p class="pd-sub">Sign in to your {{ $appSettings->app_name }} account</p>

            <form method="POST" action="{{ route('login.authenticate') }}">

                @csrf

                <div class="mb-1">
                    <label class="pd-label" for="email">Email</label>
                    <div class="pd-input-group">
                        <i class="pd-input-icon bi bi-envelope"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="pd-input @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            placeholder="you@example.com"
                            autocomplete="email">
                    </div>
                    @error('email')
                        <div class="pd-invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-1">
                    <label class="pd-label" for="password">Password</label>
                    <div class="pd-input-group">
                        <i class="pd-input-icon bi bi-lock"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="pd-input @error('password') is-invalid @enderror"
                            placeholder="Enter your password"
                            autocomplete="current-password">
                        <button type="button" class="pd-toggle-pass" onclick="pdTogglePassword()">
                            <i class="bi bi-eye" id="pdToggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="pd-invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="pd-row-between">
                    <label class="pd-remember">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            value="1"
                            {{ old('remember') ? 'checked' : '' }}>
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                        <a class="pd-forgot" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>

                <button type="submit" class="pd-btn-primary">
                    Sign In
                </button>

            </form>

            <div class="pd-divider">OR</div>

            <div class="pd-footer-text">
                Don't have an account?
                <a href="{{ route('register') }}">Create one</a>
            </div>

        </div>

    </div>

</div>

<script>
    function pdTogglePassword(){
        const input = document.getElementById('password');
        const icon = document.getElementById('pdToggleIcon');
        if(input.type === 'password'){
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>

@endsection