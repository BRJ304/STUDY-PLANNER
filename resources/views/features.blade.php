@extends('layouts.app')

@section('content')

<!-- HERO / FEATURES INTRO -->
<section class="container-fluid px-0">
    <div class="row no-gap g-0">
        <div class="col-md-6 hero-left d-flex flex-column justify-content-center" style="background: white; padding: 60px 50px;">
            <span class="hero-badge mb-2" style="background: var(--brown); border: var(--border); padding: 6px 16px; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; width: fit-content;">
                ⚡ Powerful Features
            </span>
            <h1 style="font-size: 3.2rem; font-weight: 800; letter-spacing: -1px; line-height: 1.05;">
                Everything You Need to <span style="background: var(--brown); padding: 0 6px;">Study Smarter</span>
            </h1>
            <p class="mt-2" style="font-size: 1.05rem; line-height: 1.8; color: #222; max-width: 500px;">
                From AI-powered scheduling to real-time progress tracking, StudyMind AI gives you all the tools you need to ace your exams without the burnout.
            </p>
            <div class="d-flex flex-wrap gap-3 mt-2">
                <a href="#" class="btn btn-brutal btn-brutal-primary">Get Started Free</a>
                <a href="#all-features" class="btn btn-brutal btn-brutal-secondary">See All Features</a>
            </div>
        </div>
        <div class="col-md-6" style="background: var(--green); overflow: hidden; min-height: 380px;">
            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=900&q=80" 
                 alt="Features" 
                 style="width: 100%; height: 100%; object-fit: cover; mix-blend-mode: multiply; filter: grayscale(20%);">
        </div>
    </div>
</section>

<!-- FEATURES GRID - MAIN -->
<div class="brutal-section-label" id="all-features">🚀 Core Features</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4">
        <!-- Feature 1 -->
        <div class="col-md-6 col-lg-4">
            <div class="feature-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                    <div style="width: 48px; height: 48px; border: var(--border); background: var(--brown); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
                        📅
                    </div>
                    <h4 style="font-weight: 800; margin: 0;">Dynamic Scheduling</h4>
                </div>
                <p style="color: #444; line-height: 1.7; font-size: 0.92rem;">
                    The AI scans your available hours and subject priorities, then fills your calendar with focused study blocks automatically. No more guesswork.
                </p>
                <ul style="list-style: none; padding-left: 0; margin-top: 12px;">
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Automatic calendar integration
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Priority-based subject allocation
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Smart break scheduling
                    </li>
                </ul>
            </div>
        </div>

        <!-- Feature 2 -->
        <div class="col-md-6 col-lg-4">
            <div class="feature-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                    <div style="width: 48px; height: 48px; border: var(--border); background: var(--pink); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
                        🔁
                    </div>
                    <h4 style="font-weight: 800; margin: 0;">Smart Rescheduling</h4>
                </div>
                <p style="color: #444; line-height: 1.7; font-size: 0.92rem;">
                    Missed a session? The planner instantly redistributes your remaining workload without any input from you. Life happens, we've got you covered.
                </p>
                <ul style="list-style: none; padding-left: 0; margin-top: 12px;">
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Automatic workload redistribution
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Priority-based rescheduling
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Real-time calendar updates
                    </li>
                </ul>
            </div>
        </div>

        <!-- Feature 3 -->
        <div class="col-md-6 col-lg-4">
            <div class="feature-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                    <div style="width: 48px; height: 48px; border: var(--border); background: var(--green); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
                        📊
                    </div>
                    <h4 style="font-weight: 800; margin: 0;">Progress Analytics</h4>
                </div>
                <p style="color: #444; line-height: 1.7; font-size: 0.92rem;">
                    Track your study habits in real time. The system flags weak areas early and monitors your exam readiness so you know exactly where to focus.
                </p>
                <ul style="list-style: none; padding-left: 0; margin-top: 12px;">
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Real-time progress tracking
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Weak area detection
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Exam readiness score
                    </li>
                </ul>
            </div>
        </div>

        <!-- Feature 4 -->
        <div class="col-md-6 col-lg-4">
            <div class="feature-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                    <div style="width: 48px; height: 48px; border: var(--border); background: var(--blue); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
                        🧠
                    </div>
                    <h4 style="font-weight: 800; margin: 0;">Material Upload</h4>
                </div>
                <p style="color: #444; line-height: 1.7; font-size: 0.92rem;">
                    Upload your notes, syllabi, or PDFs. The AI extracts deadlines, key topics, and milestones for a personalized study plan.
                </p>
                <ul style="list-style: none; padding-left: 0; margin-top: 12px;">
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Multiple file format support
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Automatic key topic extraction
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Smart deadline detection
                    </li>
                </ul>
            </div>
        </div>

        <!-- Feature 5 -->
        <div class="col-md-6 col-lg-4">
            <div class="feature-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                    <div style="width: 48px; height: 48px; border: var(--border); background: var(--pink); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
                        📝
                    </div>
                    <h4 style="font-weight: 800; margin: 0;">Smart Notes</h4>
                </div>
                <p style="color: #444; line-height: 1.7; font-size: 0.92rem;">
                    AI-generated summaries from your uploaded materials. Get concise, easy-to-review notes that highlight the most important concepts.
                </p>
                <ul style="list-style: none; padding-left: 0; margin-top: 12px;">
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> AI-powered summarization
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Key concept extraction
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Easy revision notes
                    </li>
                </ul>
            </div>
        </div>

        <!-- Feature 6 -->
        <div class="col-md-6 col-lg-4">
            <div class="feature-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 16px;">
                    <div style="width: 48px; height: 48px; border: var(--border); background: var(--green); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0;">
                        🎯
                    </div>
                    <h4 style="font-weight: 800; margin: 0;">Focus Timer</h4>
                </div>
                <p style="color: #444; line-height: 1.7; font-size: 0.92rem;">
                    Pomodoro sessions that sync with your daily study blocks. Stay focused and productive with timed study intervals and breaks.
                </p>
                <ul style="list-style: none; padding-left: 0; margin-top: 12px;">
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Customizable study intervals
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555; margin-bottom: 4px;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Smart break scheduling
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: #555;">
                        <span style="color: var(--brown); font-weight: 800;">✓</span> Productivity tracking
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ADVANCED FEATURES SECTION -->
<div class="brutal-section-label">🔬 Advanced Features</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4">
        <div class="col-md-4">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <div style="width: 56px; height: 56px; border: var(--border); background: var(--black); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin-bottom: 16px;">
                    🤖
                </div>
                <h4 style="font-weight: 800;">Quiz Generator</h4>
                <p style="color: #444; line-height: 1.7; font-size: 0.92rem;">
                    Auto-generated practice questions based on your syllabus. Test your knowledge with custom quizzes that adapt to your learning pace.
                </p>
                <span style="display: inline-block; background: var(--black); color: var(--brown); padding: 4px 12px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border: var(--border); margin-top: 8px;">
                    New
                </span>
            </div>
        </div>
        <div class="col-md-4">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <div style="width: 56px; height: 56px; border: var(--border); background: var(--blue); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin-bottom: 16px;">
                    📈
                </div>
                <h4 style="font-weight: 800;">Performance Dashboard</h4>
                <p style="color: #444; line-height: 1.7; font-size: 0.92rem;">
                    Detailed charts showing your strong and weak topics. Get insights into your study patterns and identify areas for improvement.
                </p>
                <span style="display: inline-block; background: var(--black); color: var(--brown); padding: 4px 12px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border: var(--border); margin-top: 8px;">
                    Popular
                </span>
            </div>
        </div>
        <div class="col-md-4">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 24px; height: 100%; transition: transform 0.1s, box-shadow 0.1s;">
                <div style="width: 56px; height: 56px; border: var(--border); background: var(--pink); display: flex; align-items: center; justify-content: center; font-size: 1.8rem; margin-bottom: 16px;">
                    🔔
                </div>
                <h4 style="font-weight: 800;">Smart Reminders</h4>
                <p style="color: #444; line-height: 1.7; font-size: 0.92rem;">
                    Never miss a study session with intelligent reminders that adapt to your schedule and learning habits.
                </p>
                <span style="display: inline-block; background: var(--black); color: var(--brown); padding: 4px 12px; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; border: var(--border); margin-top: 8px;">
                    Coming Soon
                </span>
            </div>
        </div>
    </div>
</section>

<!-- COMPARISON / PLANS SECTION -->
<div class="brutal-section-label">📊 Free vs Premium</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4">
        <div class="col-md-6">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 35px 30px; height: 100%;">
                <h3 style="font-weight: 800; display: flex; align-items: center; gap: 12px;">
                    <span style="background: var(--green); color: var(--black); padding: 4px 12px; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; border: var(--border);">
                        Free
                    </span>
                    Forever
                </h3>
                <ul style="list-style: none; padding-left: 0; margin-top: 16px;">
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #eee;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Dynamic Scheduling</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #eee;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Smart Rescheduling</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #eee;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Progress Analytics</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #eee;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Material Upload (5 files)</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #eee;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Focus Timer</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0;">
                        <span style="color: #ccc; font-weight: 800; font-size: 1.2rem;">✗</span>
                        <span style="color: #999;">Advanced Quiz Generator</span>
                    </li>
                </ul>
                <a href="#" class="btn btn-brutal btn-brutal-secondary w-100 mt-3">Get Started Free</a>
            </div>
        </div>
        <div class="col-md-6">
            <div style="background: var(--black); color: white; border: var(--border); box-shadow: var(--shadow); padding: 35px 30px; height: 100%;">
                <h3 style="font-weight: 800; display: flex; align-items: center; gap: 12px; color: white;">
                    <span style="background: var(--brown); color: white; padding: 4px 12px; font-size: 0.7rem; text-transform: uppercase; letter-spacing: 1px; border: var(--border);">
                        Pro
                    </span>
                    Coming Soon
                </h3>
                <ul style="list-style: none; padding-left: 0; margin-top: 16px;">
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #333;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Everything in Free</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #333;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Unlimited Material Upload</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #333;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Advanced Quiz Generator</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #333;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Custom Study Plans</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0; border-bottom: 1px solid #333;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Priority Support</span>
                    </li>
                    <li style="display: flex; align-items: center; gap: 10px; padding: 8px 0;">
                        <span style="color: var(--green); font-weight: 800; font-size: 1.2rem;">✓</span>
                        <span style="font-weight: 600;">Group Study Features</span>
                    </li>
                </ul>
                <a href="#" class="btn btn-brutal btn-brutal-primary w-100 mt-3" style="background: var(--brown); color: var(--black);">Join Waitlist</a>
            </div>
        </div>
    </div>
</section>

<!-- TESTIMONIAL / SOCIAL PROOF -->
<div class="brutal-section-label">⭐ What Students Say</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4">
        <div class="col-md-4">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 28px 24px; height: 100%;">
                <div style="display: flex; gap: 4px; color: var(--brown); font-size: 1.2rem; margin-bottom: 12px;">
                    ★★★★★
                </div>
                <p style="color: #444; line-height: 1.7; font-style: italic; font-size: 0.95rem;">
                    "StudyMind AI completely changed how I prepare for exams. The dynamic scheduling actually adapts to my pace, and I've never felt more prepared."
                </p>
                <div style="margin-top: 12px; display: flex; align-items: center; gap: 12px;">
                    <div style="width: 40px; height: 40px; border: var(--border); background: var(--brown); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800;">
                        SM
                    </div>
                    <div>
                        <span style="font-weight: 800; display: block; font-size: 0.9rem;">Sarah M.</span>
                        <span style="font-size: 0.8rem; color: #666;">Computer Science, Year 3</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 28px 24px; height: 100%;">
                <div style="display: flex; gap: 4px; color: var(--brown); font-size: 1.2rem; margin-bottom: 12px;">
                    ★★★★★
                </div>
                <p style="color: #444; line-height: 1.7; font-style: italic; font-size: 0.95rem;">
                    "The progress analytics feature is a game-changer. I can see exactly where I need to focus, and my grades have improved significantly."
                </p>
                <div style="margin-top: 12px; display: flex; align-items: center; gap: 12px;">
                    <div style="width: 40px; height: 40px; border: var(--border); background: var(--blue); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800;">
                        JK
                    </div>
                    <div>
                        <span style="font-weight: 800; display: block; font-size: 0.9rem;">James K.</span>
                        <span style="font-size: 0.8rem; color: #666;">Engineering, Year 2</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 28px 24px; height: 100%;">
                <div style="display: flex; gap: 4px; color: var(--brown); font-size: 1.2rem; margin-bottom: 12px;">
                    ★★★★★
                </div>
                <p style="color: #444; line-height: 1.7; font-style: italic; font-size: 0.95rem;">
                    "I love how easy it is to upload my materials and get a personalized study plan. It's like having a personal tutor who knows exactly what I need."
                </p>
                <div style="margin-top: 12px; display: flex; align-items: center; gap: 12px;">
                    <div style="width: 40px; height: 40px; border: var(--border); background: var(--green); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800;">
                        MR
                    </div>
                    <div>
                        <span style="font-weight: 800; display: block; font-size: 0.9rem;">Maya R.</span>
                        <span style="font-size: 0.8rem; color: #666;">Biology, Year 1</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<div class="container-fluid px-0">
    <div class="row no-gap g-0 border-brutal-bottom">
        <div class="col-md-6" style="background: var(--black); padding: 50px 40px; color: white;">
            <h2 style="font-weight: 800; font-size: 2.2rem; letter-spacing: -0.5px;">
                Ready to <span style="background: var(--brown); color: white; padding: 0 8px;">Study Smarter</span>?
            </h2>
            <p style="color: #bbb; line-height: 1.8; max-width: 500px;">
                Join thousands of students who are already using StudyMind AI to ace their exams without the stress. Start your free journey today.
            </p>
            <a href="#" class="btn btn-brutal btn-brutal-secondary" style="margin-top: 8px;">Get Started Free</a>
        </div>
        <div class="col-md-6" style="background: var(--brown); min-height: 240px; display: flex; align-items: center; justify-content: center; padding: 30px;">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 20px; text-align: center; width: 100%; max-width: 300px;">
                <span style="font-size: 3rem; display: block;">🚀</span>
                <p style="font-weight: 800; margin: 8px 0;">Start for Free</p>
                <a href="#" class="btn btn-brutal btn-brutal-primary w-100 mt-2" style="font-size: 0.8rem;">Sign up now</a>
            </div>
        </div>
    </div>
</div>

<!-- Additional CSS for hover effects -->
<style>
    .feature-card:hover {
        transform: translate(-3px, -3px);
        box-shadow: var(--shadow-lg);
    }
    [style*="transition: transform"]:hover {
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow-lg);
    }
</style>

@endsection