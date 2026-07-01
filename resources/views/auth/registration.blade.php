@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <!-- Register Card -->
            <div class="auth-card" style="background: white; border: var(--border); box-shadow: var(--shadow-lg); padding: 40px 35px;">
                <div class="auth-header text-center mb-4">
                    <h2 style="font-weight: 800; letter-spacing: -0.5px; font-size: 2rem;">Create Account</h2>
                    <p style="color: #555; font-size: 0.9rem; margin-top: 4px;">Start studying smarter today — it's free</p>
                </div>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger mb-3" style="border: var(--border); border-radius: 0; font-weight: 600;">
                        <ul class="mb-0" style="list-style: none; padding-left: 0;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success mb-3" style="border: var(--border); border-radius: 0; font-weight: 600;">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('register.post') }}">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               placeholder="Jamie Diaz" value="{{ old('name') }}" required autofocus>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               placeholder="you@studymind.ai" value="{{ old('email') }}" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               placeholder="Min 8 characters" required>
                        <small style="color: #888; font-size: 0.7rem;">Password must be at least 8 characters</small>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               placeholder="Confirm your password" required>
                    </div>

                    <!-- Terms & Conditions -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="terms" name="terms" required
                               style="border: var(--border); border-radius: 0;">
                        <label class="form-check-label" for="terms" style="font-weight: 600; font-size: 0.85rem;">
                            I agree to the
                            <a href="#" style="color: var(--brown); font-weight: 700; text-decoration: none;">Terms of Service</a>
                            and
                            <a href="#" style="color: var(--brown); font-weight: 700; text-decoration: none;">Privacy Policy</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-brutal btn-brutal-secondary w-100">Create Account</button>

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

                    <!-- Login Link -->
                    <div class="text-center mt-3" style="font-weight: 600;">
                        Already have an account?
                        <a href="{{ route('login') }}" style="color: var(--brown); text-decoration: none; font-weight: 800;">
                            Sign in
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