@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="auth-card" style="background: white; border: var(--border); box-shadow: var(--shadow-lg); padding: 40px 35px;">
                <div class="auth-header text-center mb-4">
                    <h2 style="font-weight: 800; letter-spacing: -0.5px; font-size: 2rem;">Reset Password</h2>
                    <p style="color: #555; font-size: 0.9rem; margin-top: 4px;">Choose a new password for your account</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger mb-3" style="border: var(--border); border-radius: 0; font-weight: 600;">
                        {{ session('error') }}
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

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               value="{{ old('email', $email) }}" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">New Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               placeholder="••••••••" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Confirm New Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px; background: #fcfcfc;"
                               placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-brutal btn-brutal-primary w-100">Reset Password</button>
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
