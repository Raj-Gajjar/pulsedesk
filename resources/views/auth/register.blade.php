@extends('layouts.auth.app')

@section('title', 'Register')

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
            <h2>Create your account and start listening to your customers.</h2>
            <p>
                Build surveys, collect responses, and turn feedback into
                decisions — all from one dashboard.
            </p>

            <div class="pd-checklist">
                <div class="pd-checklist-item">
                    <span class="pd-checklist-icon"><i class="bi bi-check-lg"></i></span>
                    Unlimited surveys and custom questions
                </div>
                <div class="pd-checklist-item">
                    <span class="pd-checklist-icon"><i class="bi bi-check-lg"></i></span>
                    Real-time response tracking
                </div>
                <div class="pd-checklist-item">
                    <span class="pd-checklist-icon"><i class="bi bi-check-lg"></i></span>
                    Reports built for your whole team
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

            <h3>Create account</h3>
            <p class="pd-sub">Register to access {{ $appSettings->app_name }}</p>

            <form method="POST" action="{{ route('register.store') }}">

                @csrf

                <div class="mb-1">
                    <label class="pd-label" for="name">Name</label>
                    <div class="pd-input-group">
                        <i class="pd-input-icon bi bi-person"></i>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            class="pd-input @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            placeholder="Enter your name"
                            autocomplete="name">
                    </div>
                    @error('name')
                        <div class="pd-invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

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
                            placeholder="Enter password"
                            autocomplete="new-password">
                        <button type="button" class="pd-toggle-pass" onclick="pdTogglePassword('password','pdToggleIcon1')">
                            <i class="bi bi-eye" id="pdToggleIcon1"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="pd-invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-1">
                    <label class="pd-label" for="password_confirmation">Confirm Password</label>
                    <div class="pd-input-group">
                        <i class="pd-input-icon bi bi-lock"></i>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="pd-input"
                            placeholder="Confirm password"
                            autocomplete="new-password">
                        <button type="button" class="pd-toggle-pass" onclick="pdTogglePassword('password_confirmation','pdToggleIcon2')">
                            <i class="bi bi-eye" id="pdToggleIcon2"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="pd-btn-primary">
                    Create Account
                </button>

            </form>

            <div class="pd-divider">OR</div>

            <div class="pd-footer-text">
                Already have an account?
                <a href="{{ route('login') }}">Sign in</a>
            </div>

        </div>

    </div>

</div>

<script>
    function pdTogglePassword(inputId, iconId){
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
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