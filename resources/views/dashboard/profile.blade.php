@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid px-0">
        <div class="row no-gap g-0">
            <div class="col-md-3 col-lg-2 dashboard-sidebar">
                @include('dashboard.sidebar')
            </div>
            <div class="col-md-9 col-lg-10 dashboard-main">
                @include('dashboard.header')
                <div class="dashboard-content p-4 p-md-5">
                    <h2 class="fw-800 mb-4">👤 My Profile</h2>

                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px; text-align: center;">
                                <div style="width: 120px; height: 120px; background: var(--brown); border: var(--border); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem; font-weight: 800; margin: 0 auto 16px;">
                                    {{ substr(Auth::user()->name, 0, 2) }}
                                </div>
                                <h4 style="font-weight: 800;">{{ Auth::user()->name }}</h4>
                                <p style="color: #666; font-size: 0.9rem;">{{ Auth::user()->email }}</p>
                                <span style="display: inline-block; background: var(--green); padding: 4px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700; margin-top: 4px;">
                                    Student
                                </span>
                                <div style="margin-top: 16px; padding-top: 16px; border-top: 1px solid #eee;">
                                    <span style="display: block; font-size: 0.85rem; color: #666;">Member since</span>
                                    <span style="font-weight: 700;">{{ Auth::user()->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px;">
                                <h5 style="font-weight: 800; margin-bottom: 16px;">Edit Profile</h5>
                                <form method="POST" action="{{ route('profile.update') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" 
                                                   style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                                   value="{{ Auth::user()->name }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                                   value="{{ Auth::user()->email }}" required>
                                        </div>
                                        <div class="col-12">
                                            <label for="school" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">School/University</label>
                                            <input type="text" class="form-control" id="school" name="school"
                                                   style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                                   placeholder="Enter your school name">
                                        </div>
                                        <div class="col-12">
                                            <label for="major" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Major/Program</label>
                                            <input type="text" class="form-control" id="major" name="major"
                                                   style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                                   placeholder="Enter your major">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-brutal btn-brutal-primary">Update Profile</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection