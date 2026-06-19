@extends('layouts.app')

@section('content')

<!-- HERO / ABOUT INTRO -->
<section class="container-fluid px-0">
    <div class="row no-gap g-0">
        <div class="col-md-6 hero-left d-flex flex-column justify-content-center" style="background: white; padding: 60px 50px;">
            <span class="hero-badge mb-2" style="background: var(--brown); border: var(--border); padding: 6px 16px; font-size: 0.8rem; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; width: fit-content;">
                ✦ Our Story
            </span>
            <h1 style="font-size: 3.2rem; font-weight: 800; letter-spacing: -1px; line-height: 1.05;">
                Built by <span style="background: var(--brown); padding: 0 6px;">Students</span>,<br>for Students.
            </h1>
            <p class="mt-2" style="font-size: 1.05rem; line-height: 1.8; color: #222; max-width: 500px;">
                We know what it's like to juggle lectures, assignments, and social life while fighting the urge to procrastinate. That's why we created StudyMind AI — a platform that turns chaos into clarity.
            </p>
            <div class="d-flex flex-wrap gap-3 mt-2">
                <a href="#" class="btn btn-brutal btn-brutal-primary">Meet the Team</a>
                <a href="#mission" class="btn btn-brutal btn-brutal-secondary">Our Mission</a>
            </div>
        </div>
        <div class="col-md-6" style="background: var(--pink); overflow: hidden; min-height: 380px;">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=900&q=80" 
                 alt="Team working together" 
                 style="width: 100%; height: 100%; object-fit: cover; mix-blend-mode: multiply; filter: grayscale(20%);">
        </div>
    </div>
</section>

<!-- MISSION SECTION -->
<div class="brutal-section-label" id="mission">🎯 Our Mission</div>
<section class="container-fluid px-0">
    <div class="row no-gap g-0 border-brutal-bottom">
        <div class="col-md-6" style="background: var(--blue); padding: 60px 50px; display: flex; flex-direction: column; justify-content: center;">
            <h2 style="font-weight: 800; font-size: 2.5rem; letter-spacing: -1px;">
                Making studying <span style="background: var(--black); color: var(--brown); padding: 0 6px;">stress-free</span> and effective.
            </h2>
            <p style="font-size: 1.1rem; line-height: 1.8; color: #111; max-width: 500px;">
                We believe that every student deserves a personalized roadmap that respects their time, pace, and goals — without the guilt or burnout. Our AI adapts to you, not the other way around.
            </p>
            <div style="display: flex; gap: 30px; flex-wrap: wrap; margin-top: 20px;">
                <div>
                    <span style="font-weight: 800; font-size: 1.8rem;">10K+</span>
                    <span style="font-weight: 600; display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Students Using It</span>
                </div>
                <div>
                    <span style="font-weight: 800; font-size: 1.8rem;">94%</span>
                    <span style="font-weight: 600; display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Report Better Scores</span>
                </div>
                <div>
                    <span style="font-weight: 800; font-size: 1.8rem;">3×</span>
                    <span style="font-weight: 600; display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">More Study Consistency</span>
                </div>
            </div>
        </div>
        <div class="col-md-6" style="background: var(--green); min-height: 300px; overflow: hidden;">
            <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&q=80" 
                 alt="Students collaborating" 
                 style="width: 100%; height: 100%; object-fit: cover; mix-blend-mode: multiply;">
        </div>
    </div>
</section>

<!-- VALUES SECTION -->
<div class="brutal-section-label">🧭 Our Values</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="value-card" style="background: white; border: var(--border); padding: 32px 24px; box-shadow: var(--shadow); height: 100%;">
                <span style="font-size: 2rem; display: block; margin-bottom: 10px;">🧠</span>
                <h4 style="font-weight: 800;">Empathy First</h4>
                <p style="color: #444; line-height: 1.7;">We design every feature with the student experience in mind — because we've been there too. Your struggles are our struggles.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="value-card" style="background: white; border: var(--border); padding: 32px 24px; box-shadow: var(--shadow); height: 100%;">
                <span style="font-size: 2rem; display: block; margin-bottom: 10px;">⚡</span>
                <h4 style="font-weight: 800;">Adaptability</h4>
                <p style="color: #444; line-height: 1.7;">Plans change, life happens. Our AI adapts in real-time, so you never feel left behind or overwhelmed by unexpected events.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="value-card" style="background: white; border: var(--border); padding: 32px 24px; box-shadow: var(--shadow); height: 100%;">
                <span style="font-size: 2rem; display: block; margin-bottom: 10px;">🔓</span>
                <h4 style="font-weight: 800;">Accessible to All</h4>
                <p style="color: #444; line-height: 1.7;">Education should be free. That's why StudyMind AI is completely free for every student — no hidden fees, no premium tiers.</p>
            </div>
        </div>
    </div>
</section>

<!-- TEAM SECTION -->
<div class="brutal-section-label">👥 Meet the Team</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4">
        <div class="col-md-3 col-sm-6">
            <div class="team-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 20px; transition: transform 0.1s, box-shadow 0.1s; height: 100%; text-align: center;">
                <div style="width: 90px; height: 90px; border-radius: 50%; border: var(--border); background: var(--brown); color: white; margin: 0 auto 16px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; font-weight: 800;">
                    JD
                </div>
                <h5 style="font-weight: 800;">Jamie Diaz</h5>
                <span style="font-weight: 600; font-size: 0.85rem; color: var(--brown); display: block; margin-bottom: 8px;">Co-founder &amp; AI Lead</span>
                <p style="font-size: 0.8rem; color: #555; margin-top: 8px;">CS grad, former crammer, now building smarter study tools for everyone.</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="team-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 20px; transition: transform 0.1s, box-shadow 0.1s; height: 100%; text-align: center;">
                <div style="width: 90px; height: 90px; border-radius: 50%; border: var(--border); background: var(--pink); color: white; margin: 0 auto 16px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; font-weight: 800;">
                    TR
                </div>
                <h5 style="font-weight: 800;">Taylor Reed</h5>
                <span style="font-weight: 600; font-size: 0.85rem; color: var(--brown); display: block; margin-bottom: 8px;">Product &amp; Design</span>
                <p style="font-size: 0.8rem; color: #555; margin-top: 8px;">Loves brutalist design and making complex things feel simple and intuitive.</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="team-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 20px; transition: transform 0.1s, box-shadow 0.1s; height: 100%; text-align: center;">
                <div style="width: 90px; height: 90px; border-radius: 50%; border: var(--border); background: var(--blue); color: white; margin: 0 auto 16px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; font-weight: 800;">
                    MC
                </div>
                <h5 style="font-weight: 800;">Morgan Chen</h5>
                <span style="font-weight: 600; font-size: 0.85rem; color: var(--brown); display: block; margin-bottom: 8px;">Data &amp; Analytics</span>
                <p style="font-size: 0.8rem; color: #555; margin-top: 8px;">Turned study data into insights that actually help students improve their grades.</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="team-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 20px; transition: transform 0.1s, box-shadow 0.1s; height: 100%; text-align: center;">
                <div style="width: 90px; height: 90px; border-radius: 50%; border: var(--border); background: var(--green); color: white; margin: 0 auto 16px; display: flex; align-items: center; justify-content: center; font-size: 2.2rem; font-weight: 800;">
                    AS
                </div>
                <h5 style="font-weight: 800;">Avery Singh</h5>
                <span style="font-weight: 600; font-size: 0.85rem; color: var(--brown); display: block; margin-bottom: 8px;">Community &amp; Growth</span>
                <p style="font-size: 0.8rem; color: #555; margin-top: 8px;">On a mission to make StudyMind AI the go-to study planner worldwide.</p>
            </div>
        </div>
    </div>
</section>

<!-- TIMELINE / JOURNEY -->
<div class="brutal-section-label">📖 Our Journey</div>
<section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
    <div class="row g-4">
        <div class="col-md-3 col-sm-6">
            <div style="background: white; border: var(--border); padding: 24px; box-shadow: var(--shadow); height: 100%;">
                <span style="font-size: 2.5rem; font-weight: 800; color: var(--brown); display: block; margin-bottom: 8px;">2024</span>
                <h5 style="font-weight: 800;">The Idea</h5>
                <p style="font-size: 0.85rem; color: #555; line-height: 1.6;">Four students frustrated with traditional study methods decided to build an AI-powered solution.</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div style="background: white; border: var(--border); padding: 24px; box-shadow: var(--shadow); height: 100%;">
                <span style="font-size: 2.5rem; font-weight: 800; color: var(--brown); display: block; margin-bottom: 8px;">2025</span>
                <h5 style="font-weight: 800;">The Build</h5>
                <p style="font-size: 0.85rem; color: #555; line-height: 1.6;">Developed the first version of StudyMind AI and tested it with 500 students across 10 universities.</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div style="background: white; border: var(--border); padding: 24px; box-shadow: var(--shadow); height: 100%;">
                <span style="font-size: 2.5rem; font-weight: 800; color: var(--brown); display: block; margin-bottom: 8px;">2026</span>
                <h5 style="font-weight: 800;">The Launch</h5>
                <p style="font-size: 0.85rem; color: #555; line-height: 1.6;">Officially launched to the public, helping 10,000+ students study smarter, not harder.</p>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div style="background: white; border: var(--border); padding: 24px; box-shadow: var(--shadow); height: 100%;">
                <span style="font-size: 2.5rem; font-weight: 800; color: var(--brown); display: block; margin-bottom: 8px;">Future</span>
                <h5 style="font-weight: 800;">The Vision</h5>
                <p style="font-size: 0.85rem; color: #555; line-height: 1.6;">Expanding features, reaching more students, and making education accessible to everyone.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<div class="container-fluid px-0">
    <div class="row no-gap g-0 border-brutal-bottom">
        <div class="col-md-6" style="background: var(--black); padding: 50px 40px; color: white;">
            <h2 style="font-weight: 800; font-size: 2.2rem; letter-spacing: -0.5px;">
                Join <span style="background: var(--brown); color: white; padding: 0 8px;">10,000+</span> students
            </h2>
            <p style="color: #bbb; line-height: 1.8; max-width: 500px;">
                Start studying smarter today. It's free, it's fast, and it actually works. Join our community of motivated learners.
            </p>
            <a href="#" class="btn btn-brutal btn-brutal-secondary" style="margin-top: 8px;">Get Started Free</a>
        </div>
        <div class="col-md-6" style="background: var(--brown); min-height: 240px; display: flex; align-items: center; justify-content: center; padding: 30px;">
            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 30px 20px; text-align: center; width: 100%; max-width: 300px;">
                <span style="font-size: 3rem; display: block;">🚀</span>
                <p style="font-weight: 800; margin: 8px 0;">Ready to level up?</p>
                <a href="#" class="btn btn-brutal btn-brutal-primary w-100 mt-2" style="font-size: 0.8rem;">Sign up now</a>
            </div>
        </div>
    </div>
</div>

<!-- Additional CSS for hover effects -->
<style>
    .team-card:hover {
        transform: translate(-3px, -3px);
        box-shadow: var(--shadow-lg);
    }
    .value-card:hover {
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow-lg);
        transition: transform 0.1s, box-shadow 0.1s;
    }
</style>

@endsection
