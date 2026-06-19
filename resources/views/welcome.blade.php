    @extends('layouts.app')

    @section('content')
    
    
    <!-- HERO -->
    <section class="container-fluid px-0">
        <div class="row no-gap g-0">
            <div class="col-md-6 hero-left d-flex flex-column justify-content-center">
                <span class="hero-badge mb-2">AI-Powered · Free to Use</span>
                <h1>Study <span>Smarter.</span><br>Not Harder.</h1>
                <p class="mt-2" style="font-size:1rem;line-height:1.75;color:#333;max-width:460px;">
                    An AI-powered study planner that analyzes your syllabus, tracks your progress,
                    and builds a realistic schedule that adapts to your pace. No more last-minute
                    cramming — just a clear, daily plan that actually works.
                </p>
                <div class="d-flex flex-wrap gap-3 mt-2">
                    <a href="#" class="btn btn-brutal btn-brutal-primary">Get Started Free</a>
                    <a href="#how" class="btn btn-brutal btn-brutal-secondary">How It Works</a>
                </div>
            </div>
            <div class="col-md-6 hero-right">
                <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=900&q=80"
                    alt="Student studying">
            </div>
        </div>
    </section>

    <!-- SECTION LABEL + HOW IT WORKS -->
    <div class="brutal-section-label" id="how">⚡ How It Works</div>
    <div class="container-fluid px-0">
        <div class="row no-gap g-0 border-brutal-bottom">
            <div class="col-sm-6 col-lg-3 feat-card border-end border-brutal border-bottom border-bottom-sm-0">
                <div class="feat-icon bg-brutal-brown">📅</div>
                <h3>Dynamic Scheduling</h3>
                <p>The AI scans your available hours and subject priorities, then fills your calendar with focused study
                    blocks automatically.</p>
            </div>
            <div class="col-sm-6 col-lg-3 feat-card border-end border-brutal border-bottom border-bottom-sm-0">
                <div class="feat-icon bg-brutal-pink">🔁</div>
                <h3>Smart Rescheduling</h3>
                <p>Missed a session? The planner instantly redistributes your remaining workload without any input from
                    you.</p>
            </div>
            <div class="col-sm-6 col-lg-3 feat-card border-end border-brutal border-bottom border-bottom-lg-0">
                <div class="feat-icon bg-brutal-green">📊</div>
                <h3>Progress Analytics</h3>
                <p>Track your study habits in real time. The system flags weak areas early and monitors your exam
                    readiness.</p>
            </div>
            <div class="col-sm-6 col-lg-3 feat-card border-end-0">
                <div class="feat-icon bg-brutal-blue">🧠</div>
                <h3>Material Upload</h3>
                <p>Upload your notes, syllabi, or PDFs. The AI extracts deadlines, key topics, and milestones for a
                    personalized plan.</p>
            </div>
        </div>
    </div>

    <!-- SHOWCASE -->
    <section class="container-fluid px-0">
        <div class="row no-gap g-0 border-brutal-bottom">
            <div class="col-md-6 showcase-img">
                <img src="https://images.unsplash.com/photo-1506784983877-45594efa4cbe?w=800&q=80"
                    alt="Organized study calendar">
            </div>
            <div class="col-md-6 showcase-text d-flex flex-column justify-content-center">
                <h2>Your Plan Adapts.<br>Every Single Day.</h2>
                <p style="color:#222;line-height:1.8;font-size:0.93rem;">
                    Unlike a static timetable that falls apart the moment you miss one session,
                    StudyMind AI continuously recalibrates. It knows how many days are left,
                    which topics need the most attention, and how to distribute your workload
                    without burning you out.
                </p>
                <a href="#" class="btn btn-brutal btn-brutal-primary w-fit mt-2" style="width:fit-content;">Try It
                    Now</a>
            </div>
        </div>
    </section>

    <!-- STATS -->
    <div class="container-fluid px-0">
        <div class="row no-gap g-0 border-brutal-bottom">
            <div class="col-md-4 stat-box bg-brutal-pink">
                <span class="stat-num">10K+</span>
                <span class="stat-label">Students Using It</span>
            </div>
            <div class="col-md-4 stat-box bg-white">
                <span class="stat-num">94%</span>
                <span class="stat-label">Report Better Scores</span>
            </div>
            <div class="col-md-4 stat-box bg-brutal-green">
                <span class="stat-num">3×</span>
                <span class="stat-label">More Study Consistency</span>
            </div>
        </div>
    </div>

    <!-- ABOUT -->
    <div class="brutal-section-label">👋 About Us</div>
    <section class="container-fluid px-0">
        <div class="row no-gap g-0 border-brutal-bottom">
            <div class="col-md-4 about-img-box">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&q=80"
                    alt="Students working">
            </div>
            <div class="col-md-4 about-img-box border-start border-brutal">
                <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&q=80"
                    alt="Team collaboration">
            </div>
            <div class="col-md-4 about-text-box d-flex flex-column justify-content-center">
                <h2>Built by Students,<br>for <span>Students.</span></h2>
                <p>
                    We lived through the chaos of last-minute cramming and disorganized prep.
                    So we built StudyMind AI — a tool that crafts a plan around your pace,
                    your strengths, and your deadlines. A system that genuinely adapts to you.
                </p>
                <a href="#" class="btn btn-brutal btn-brutal-secondary w-fit mt-2" style="width:fit-content;">Meet the
                    Team</a>
            </div>
        </div>
    </section>

    <!-- TOOLS SECTION (extra grid) -->
    <section class="container-fluid px-4 px-md-5 py-5 bg-white border-brutal-bottom">
        <h2 class="fw-800 fs-1 mb-4">⚙️ AI Tools</h2>
        <div class="row g-4">
            <div class="col-6 col-md-3">
                <div class="tool-card">
                    <span class="tool-icon">📝</span>
                    <h4>Smart Notes</h4>
                    <p>AI-generated summaries from your uploaded materials.</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="tool-card">
                    <span class="tool-icon">🎯</span>
                    <h4>Focus Timer</h4>
                    <p>Pomodoro sessions that sync with your daily study blocks.</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="tool-card">
                    <span class="tool-icon">📈</span>
                    <h4>Performance</h4>
                    <p>Detailed charts showing your strong and weak topics.</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="tool-card">
                    <span class="tool-icon">🤖</span>
                    <h4>Quiz Generator</h4>
                    <p>Auto-generated practice questions based on your syllabus.</p>
                </div>
            </div>
        </div>
    </section>
@endsection