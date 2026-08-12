@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="auth-card" style="background: white; border: var(--border); box-shadow: var(--shadow-lg); padding: 40px 35px;">
                <div class="auth-header text-center mb-4">
                    <h2 style="font-weight: 800; letter-spacing: -0.5px; font-size: 2rem;">Forgot Password</h2>
                    <p style="color: #555; font-size: 0.9rem; margin-top: 4px;">Enter your email and we'll send you a reset link</p>
                </div>

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

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               placeholder="you@studymind.ai" value="{{ old('email') }}" required autofocus>
                    </div>

                    <button type="submit" class="btn btn-brutal btn-brutal-primary w-100">Send Reset Link</button>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" style="color: var(--brown); text-decoration: none; font-weight: 800;">
                        Back to Sign In
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
