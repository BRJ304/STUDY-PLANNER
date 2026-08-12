@extends('layouts.app')

@section('content')

<section class="container-fluid px-0">
    <div class="row g-0">
        <div class="col-md-6 hero-left d-flex flex-column justify-content-center p-4 p-md-5">
            <span class="hero-badge mb-3">AI-Powered · Free to Use</span>
            <h1>Study <span>Smarter.</span><br>Not Harder.</h1>
            <p class="mt-3 mb-4" style="font-size:1.1rem; line-height:1.75; color:#333; max-width:500px;">
                An AI-powered study planner that analyzes your syllabus, tracks your progress, and builds a realistic schedule.
            </p>
            <div class="d-flex flex-wrap gap-3">
                <a href="#" class="btn btn-brutal btn-brutal-primary">Get Started Free</a>
                <a href="#how" class="btn btn-brutal btn-brutal-secondary">How It Works</a>
            </div>
        </div>
        <div class="col-md-6 hero-right" >
            <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=900&q=80" 
                 class="w-100 h-100" style="object-fit: cover; min-height: 300px;" alt="Student">
        </div>
    </div>
</section>

<div class="brutal-section-label" id="how">⚡ How It Works</div>
<div class="container-fluid px-0">
    <div class="row g-0 border-bottom border-brutal">
        <div class="col-sm-6 col-lg-3 p-4 p-md-5 border-end border-brutal">
            <div class="feat-icon bg-brutal-brown mb-3">📅</div>
            <h3>Dynamic Scheduling</h3>
            <p>The AI scans your hours and priorities to fill your calendar automatically.</p>
        </div>
        <div class="col-sm-6 col-lg-3 p-4 p-md-5 border-end border-brutal">
            <div class="feat-icon bg-brutal-pink mb-3">🔁</div>
            <h3>Smart Rescheduling</h3>
            <p>Missed a session? The planner instantly redistributes your workload.</p>
        </div>
        <div class="col-sm-6 col-lg-3 p-4 p-md-5 border-end border-brutal">
            <div class="feat-icon bg-brutal-green mb-3">📊</div>
            <h3>Progress Analytics</h3>
            <p>Track study habits in real-time and flag weak areas early.</p>
        </div>
        <div class="col-sm-6 col-lg-3 p-4 p-md-5 border-end border-brutal">
            <div class="feat-icon bg-brutal-blue mb-3">🧠</div>
            <h3>Material Upload</h3>
            <p>Upload notes or PDFs for a personalized plan based on your deadlines.</p>
        </div>
    </div>
</div>

<section class="container-fluid px-0">
    <div class="row g-0 border-bottom">
        <div class="col-md-6 showcase-img">
            <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?w=800&q=80" 
                 class="w-100 h-100" style="object-fit: cover; min-height: 300px;">
        </div>
        <div class="col-md-6 p-4 p-md-5 d-flex flex-column justify-content-center">
            <h2 class="mb-3">Your Plan Adapts.<br>Every Single Day.</h2>
            <p class="mb-4" style="line-height:1.8;">Unlike a static timetable, StudyMind AI continuously recalibrates based on your progress.</p>
            <a href="#" class="btn btn-brutal btn-brutal-primary">Try It Now</a>
        </div>
    </div>
</section>

@endsection