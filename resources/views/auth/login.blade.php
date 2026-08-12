@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <!-- Login Card -->
            <div class="auth-card" style="background: white; border: var(--border); box-shadow: var(--shadow-lg); padding: 40px 35px;">
                <div class="auth-header text-center mb-4">
                    <h2 style="font-weight: 800; letter-spacing: -0.5px; font-size: 2rem;">Welcome Back</h2>
                    <p style="color: #555; font-size: 0.9rem; margin-top: 4px;">Sign in to continue your study plan</p>
                </div>

                <!-- Session Status / Error Messages -->
                @if(session('error'))
                    <div class="alert alert-danger mb-3" style="border: var(--border); border-radius: 0; font-weight: 600;">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success mb-3" style="border: var(--border); border-radius: 0; font-weight: 600;">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger mb-3" style="border: var(--border); border-radius: 0; font-weight: 600;">
                        <ul class="mb-0" style="list-style: none; padding-left: 0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Email</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               placeholder="you@studymind.ai" value="{{ old('email') }}" required autofocus>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               placeholder="••••••••" required>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember_me" name="remember"
                                   style="border: var(--border); border-radius: 0;">
                            <label class="form-check-label" for="remember_me" style="font-weight: 600; font-size: 0.85rem;">
                                Remember me
                            </label>
                        </div>
                        <a href="{{ route('password.request') }}" style="color: var(--brown); font-weight: 700; font-size: 0.85rem; text-decoration: none;">
                            Forgot password?
                        </a>
                    </div>

                    <button type="submit" class="btn btn-brutal btn-brutal-primary w-100">Sign In</button>

                    <!-- Demo Credentials -->
                    <div style="background: #f8f4f0; border: var(--border); padding: 12px; margin-top: 16px; text-align: center;">
                        <p style="font-size: 0.8rem; margin: 0; font-weight: 600; color: #666;">
                            Demo Credentials:
                        </p>
                        <p style="font-size: 0.8rem; margin: 4px 0; font-weight: 600; color: var(--brown);">
                            Email: demo@studymind.ai<br>
                            Password: password123
                        </p>
                    </div>

                    <!-- Divider -->
                    <div class="d-flex align-items-center gap-3 my-3" style="color: #888; font-weight: 600; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px;">
                        <hr style="flex: 1; height: 2.5px; background: var(--black); margin: 0;">
                        <span>or continue with</span>
                        <hr style="flex: 1; height: 2.5px; background: var(--black); margin: 0;">
                    </div>

                    <!-- Social Login -->
                    <div class="d-flex gap-2">
                        <button type="button" class="social-btn flex-fill" style="border: var(--border); padding: 10px; font-weight: 700; font-size: 0.85rem; background: white; transition: transform 0.1s, box-shadow 0.1s;">
                            <i class="bi bi-google"></i> Google
                        </button>
                        <button type="button" class="social-btn flex-fill" style="border: var(--border); padding: 10px; font-weight: 700; font-size: 0.85rem; background: white; transition: transform 0.1s, box-shadow 0.1s;">
                            <i class="bi bi-github"></i> GitHub
                        </button>
                    </div>

                    <!-- Register Link -->
                    <div class="text-center mt-3" style="font-weight: 600;">
                        Don't have an account?
                        <a href="{{ route('register') }}" style="color: var(--brown); text-decoration: none; font-weight: 800;">
                            Sign up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .auth-card .form-control:focus {
        box-shadow: none;
        border-color: var(--black);
        background: white;
    }
    .auth-card .form-check-input:checked {
        background-color: var(--black);
        border-color: var(--black);
    }
    .social-btn:hover {
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow);
    }
</style>
@endsection