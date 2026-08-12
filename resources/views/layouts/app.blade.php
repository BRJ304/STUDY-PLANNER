<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudyMind AI · Bootstrap 5</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- Bootstrap 5 CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* ── reset / base ── */
        * { box-sizing: border-box; }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: #f5f0e8;
            color: #0a0a0a;
        }

        :root {
            --black: #412D15;
            --brown: #F0DAD5;
            --pink: #FF6BB5;
            --blue: #5B8DEF;
            --green: #3DDC84;
            --shadow: 4px 4px 0px var(--black);
            --shadow-lg: 6px 6px 0px var(--black);
            --border: 2.5px solid var(--black);
            /* Unified primary-button color (see .btn-brutal-primary / .btn-search) */
            --btn: #A3C4E0;
            --btn-hover: #8FB2D6;
            --btn-ink: #21303F;
        }

        /* ── brutalist helpers ── */
        .brutal-border { border: var(--border); }
        .brutal-shadow { box-shadow: var(--shadow); }
        .brutal-shadow-lg { box-shadow: var(--shadow-lg); }
        .brutal-transition { transition: transform 0.1s, box-shadow 0.1s; }
        .brutal-hover:hover { transform: translate(-2px, -2px); box-shadow: var(--shadow-lg); }
        .bg-brutal-black { background: var(--black); }
        .bg-brutal-brown { background: var(--brown); }
        .bg-brutal-pink { background: var(--pink); }
        .bg-brutal-blue { background: var(--blue); }
        .bg-brutal-green { background: var(--green); }
        .text-brutal-brown { color: var(--brown); }
        .text-brutal-black { color: var(--black); }
        .border-brutal { border: var(--border); }

        /* ── Nav ── */
        .navbar-brutal {
            background: var(--brown);
            border-bottom: 3px solid var(--black);
            min-height: 64px;
        }
        .navbar-brutal .navbar-brand { font-weight: 800; letter-spacing: -0.5px; color: var(--black); }
        .navbar-brutal .navbar-nav {
            /* every item = width of the widest label ("CONTACT US"),
               so all buttons match without hard-coding a pixel width */
            display: grid;
            grid-auto-flow: column;
            grid-auto-columns: 1fr;
            gap: 10px;
        }

        .navbar-brutal .nav-link {
            background: white; border: var(--border); box-shadow: var(--shadow);
            font-weight: 700; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;
            padding: 8px 14px; margin-right: 0; color: var(--black);
            text-align: center;
            white-space: nowrap;
            transition: transform 0.1s, box-shadow 0.1s;
        }
        .navbar-brutal .nav-link:hover { transform: translate(-2px, -2px); box-shadow: var(--shadow-lg); color: var(--black); }
        .navbar-brutal .form-control {
            border: var(--border); border-right: none; font-weight: 600; font-size: 0.85rem;
            border-radius: 0; background: white; font-family: inherit; width: 200px;
        }
        .navbar-brutal .btn-search {
            background: var(--btn); color: var(--btn-ink); border: var(--border);
            font-weight: 800; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;
            padding: 8px 16px; border-radius: 0; font-family: inherit;
            transition: transform 0.1s, background 0.1s;
        }
        .navbar-brutal .btn-search:hover { background: var(--btn-hover); color: var(--btn-ink); transform: translate(-2px, -2px); }
        .navbar-brutal .btn-search:active { transform: translate(1px, 1px); }

        /* ── Buttons ── */
        .btn-brutal {
            font-family: inherit; font-weight: 800; font-size: 0.95rem;
            border: var(--border); box-shadow: var(--shadow);
            text-transform: uppercase; letter-spacing: 0.5px;
            padding: 12px 28px; border-radius: 0;
            transition: transform 0.1s, box-shadow 0.1s;
        }
        .btn-brutal:hover { transform: translate(-2px, -2px); box-shadow: var(--shadow-lg); }
        /* Brutalist press: click pushes the button down into its hard shadow */
        .btn-brutal:active { transform: translate(4px, 4px); box-shadow: none; }
        .btn-brutal-primary { background: var(--btn); color: var(--btn-ink); }
        .btn-brutal-primary:hover { background: var(--btn-hover); color: var(--btn-ink); }
        .btn-brutal-secondary { background: var(--brown); color: var(--black); }
        .btn-brutal-outline { background: white; color: var(--black); }

        /* ── hero ── */
        .hero-left { background: white; padding: 60px 50px; }
        .hero-badge {
            background: var(--brown); border: var(--border);
            padding: 6px 16px; font-size: 0.8rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 1px; width: fit-content;
        }
        .hero-left h1 { font-size: 3.2rem; font-weight: 800; letter-spacing: -1px; line-height: 1.05; }
        .hero-left h1 span { background: var(--brown); padding: 0 4px; }
        .hero-right { background: var(--blue); overflow: hidden; min-height: 380px; }
        .hero-right img { width: 100%; height: 100%; object-fit: cover; mix-blend-mode: multiply; filter: grayscale(20%); }

        /* ── feature cards ── */
        .feat-icon {
            width: 52px; height: 52px; border: var(--border); box-shadow: var(--shadow);
            display: flex; align-items: center; justify-content: center; font-size: 1.5rem;
        }
        .feat-card { padding: 40px 30px; }
        .feat-card h3 { font-size: 1.1rem; font-weight: 800; letter-spacing: -0.3px; }
        .feat-card p { font-size: 0.88rem; line-height: 1.8; color: #444; }

        /* ── showcase ── */
        .showcase-img { min-height: 260px; overflow: hidden; }
        .showcase-img img { width: 100%; height: 100%; object-fit: cover; filter: grayscale(15%); }
        .showcase-text { background: var(--brown); padding: 50px 45px; }
        .showcase-text h2 { font-size: 2.2rem; font-weight: 800; letter-spacing: -0.5px; }

        /* ── stat boxes ── */
        .stat-box { padding: 40px; text-align: center; }
        .stat-num { font-size: 3.5rem; font-weight: 800; letter-spacing: -2px; display: block; }
        .stat-label { font-size: 0.85rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #333; }

        /* ── about ── */
        .about-img-box { min-height: 220px; overflow: hidden; }
        .about-img-box img { width: 100%; height: 100%; object-fit: cover; }
        .about-text-box { background: var(--black); color: white; padding: 50px 40px; }
        .about-text-box h2 { font-size: 2rem; font-weight: 800; letter-spacing: -0.5px; }
        .about-text-box h2 span { color: var(--brown); }
        .about-text-box p { color: #ccc; line-height: 1.85; }

        /* ── tools ── */
        .tool-card {
            padding: 28px 24px; border: 2.5px solid var(--black); background: white;
            transition: transform 0.1s, box-shadow 0.1s, background 0.1s;
            cursor: default; height: 100%;
        }
        .tool-card:hover {
            background: var(--brown); transform: translate(-3px, -3px);
            box-shadow: var(--shadow-lg); z-index: 2; position: relative;
        }
        .tool-card .tool-icon { font-size: 1.8rem; display: block; margin-bottom: 14px; }
        .tool-card h4 { font-weight: 800; }
        .tool-card p { font-size: 0.82rem; line-height: 1.7; color: #555; }
        .tool-card:hover p { color: #111; }

        /* ── footer ── */
        .footer-brutal { background: var(--black); color: white; padding: 30px 40px; }
        .footer-brutal .foot-logo { font-size: 1.2rem; font-weight: 800; color: var(--brown); }
        .footer-brutal a {
            color: #aaa; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;
            text-decoration: none; font-size: 0.82rem;
        }
        .footer-brutal a:hover { color: var(--brown); }

        /* utility to keep borders in grid */
        .border-right-brutal { border-right: 3px solid var(--black); }
        .border-bottom-brutal { border-bottom: 3px solid var(--black); }
        .border-left-brutal { border-left: 3px solid var(--black); }
        .border-brutal-all { border: 3px solid var(--black); }
        .border-brutal-bottom { border-bottom: 3px solid var(--black); }

        .brutal-section-label {
            background: var(--black); color: var(--brown);
            padding: 22px 60px;
            font-size: 0.8rem; font-weight: 800;
            text-transform: uppercase; letter-spacing: 3px;
            border-bottom: 3px solid var(--black);
            display: flex;
            align-items: center;
            gap: 20px;
        }
        /* balances the empty right side of the label bar with a subtle accent rule */
        .brutal-section-label::after {
            content: "";
            flex: 1;
            height: 2px;
            background: rgba(184, 227, 233, 0.35);
        }

        .no-gap > [class*="col-"] { padding-left: 0; padding-right: 0; }
        .no-gap .row { margin-left: 0; margin-right: 0; }

        /* ══════════════════════════════════════════════════════════════════
           PADDING FIX — restore inner padding stripped by .no-gap.
           Prefixed with `html body` to beat .no-gap>[col-*] specificity.
           ══════════════════════════════════════════════════════════════════ */
        html body .no-gap > .hero-left      { padding: 90px 72px !important; }
        html body .no-gap > .hero-right     { padding: 0 !important; }
        html body .no-gap > .showcase-text  { padding: 70px 60px !important; }
        html body .no-gap > .showcase-img   { padding: 0 !important; }
        html body .no-gap > .about-text-box { padding: 70px 60px !important; }
        html body .no-gap > .about-img-box  { padding: 0 !important; }
        html body .no-gap > .stat-box       { padding: 64px 40px !important; }
        html body .no-gap > .feat-card      { padding: 56px 44px !important; }

        html body .no-gap > .hero-right img,
        html body .no-gap > .showcase-img img,
        html body .no-gap > .about-img-box img {
            width: 100%; height: 100%; object-fit: cover; display: block;
        }

        /* prevent double borders where adjacent feature cards touch
           (each has .border-brutal on all 4 sides, so meeting edges stack) */
        html body .no-gap > .feat-card + .feat-card { border-left: 0 !important; }
        html body .no-gap > .feat-card {
            display: flex;
            flex-direction: column;
        }
        html body .no-gap > .feat-card .feat-icon { margin-bottom: 22px; }
        html body .no-gap > .feat-card h3        { margin-bottom: 12px; }

        /* AI Tools grid section — pull off the viewport edges */
        section.container-fluid.bg-white.border-brutal-bottom {
            padding-left: clamp(28px, 5vw, 72px) !important;
            padding-right: clamp(28px, 5vw, 72px) !important;
        }

        /* ── responsive ── */
        @media (max-width: 992px) {
            html body .no-gap > .hero-left      { padding: 60px 40px !important; }
            html body .no-gap > .showcase-text,
            html body .no-gap > .about-text-box { padding: 56px 40px !important; }
            html body .no-gap > .feat-card      { padding: 44px 32px !important; }
            html body .no-gap > .stat-box       { padding: 48px 28px !important; }
            .brutal-section-label               { padding: 20px 40px; }
        }

        @media (max-width: 768px) {
            .hero-left h1 { font-size: 2.2rem; }
            .navbar-brutal .form-control { width: 130px; }

            html body .no-gap > .hero-left,
            html body .no-gap > .showcase-text,
            html body .no-gap > .about-text-box { padding: 40px 24px !important; }
            html body .no-gap > .feat-card      { padding: 32px 24px !important; }
            html body .no-gap > .stat-box       { padding: 36px 24px !important; }
            .brutal-section-label               { padding: 16px 24px; letter-spacing: 2px; }
        }

        @media (max-width: 767.98px) {
            /* collapsed mobile menu: stack full-width buttons */
            .navbar-brutal .navbar-nav {
                display: flex;
                flex-direction: column;
                gap: 8px;
            }
            .navbar-brutal .nav-link {
                width: 100%;
                text-align: left;
            }
        }

        @media (max-width: 576px) {
            .navbar-brutal .form-control { width: 100px; }
        }

        /* ══════════════════════════════════════════════════════════════════
           MOCK UI CARDS — illustrated cards that replace photos
           (Today's-Plan reference style: white card, black border, hard shadow)
           ══════════════════════════════════════════════════════════════════ */
        .mock-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px 28px;
            width: 100%;
            height: 100%;
        }
        .mock-card {
            background: #fff;
            border: 3px solid var(--black);
            box-shadow: 10px 10px 0 var(--black);
            padding: 28px 26px;
            width: 100%;
            max-width: 440px;
        }
        .mock-card-sm {
            max-width: 300px;
            padding: 22px 20px;
            box-shadow: 8px 8px 0 var(--black);
        }
        .mock-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            border-bottom: 3px solid var(--black);
            padding-bottom: 14px;
            margin-bottom: 6px;
        }
        .mock-title {
            font-weight: 800;
            font-size: 1rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .mock-chip {
            border: 2.5px solid var(--black);
            font-weight: 800;
            font-size: 0.7rem;
            letter-spacing: 1px;
            padding: 5px 12px;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .mock-row {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 0;
            border-bottom: 2px dashed #c9c9c9;
            font-weight: 700;
            font-size: 0.93rem;
        }
        .mock-row:last-child { border-bottom: 0; padding-bottom: 0; }
        .mock-check {
            width: 26px; height: 26px;
            border: 2.5px solid var(--black);
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 0.9rem;
            flex: none;
            background: var(--green);
        }
        .mock-check.off { background: #fff; font-size: 0.6rem; }
        .mock-meta { margin-left: auto; color: #555; font-weight: 700; font-size: 0.83rem; white-space: nowrap; }
        .mock-bar {
            height: 14px;
            border: 2.5px solid var(--black);
            background: #fff;
            position: relative;
            flex: 1;
            min-width: 60px;
        }
        .mock-bar > span { position: absolute; top: 0; left: 0; bottom: 0; display: block; background: var(--brown); }
        .mock-face {
            width: 34px; height: 34px;
            border: 2.5px solid var(--black);
            background: var(--brown);
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 0.78rem;
            flex: none;
        }
        @media (max-width: 768px) {
            .mock-panel { padding: 32px 18px; }
            .mock-card { padding: 22px 18px; box-shadow: 7px 7px 0 var(--black); }
        }

        /* ══════════════════════════════════════════════════════════════════
           MOTION SYSTEM — 120fps-friendly: animates ONLY transform + opacity
           (compositor properties). box-shadow snaps instantly (no repaint
           thrash), which also suits the hard brutalist shadow style.
           ══════════════════════════════════════════════════════════════════ */
        html { scroll-behavior: smooth; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translate3d(0, 18px, 0); }
            to   { opacity: 1; transform: translate3d(0, 0, 0); }
        }

        .pre-anim {
            opacity: 0;
            will-change: transform, opacity;
        }
        .anim-in {
            animation: fadeUp 0.55s cubic-bezier(0.22, 0.61, 0.36, 1) both;
        }
        .anim-done { will-change: auto; } /* release GPU memory after reveal */

        /* hover lift: transform-only transition; shadow + color snap */
        .btn-brutal,
        .navbar-brutal .nav-link,
        .tool-card,
        .feat-icon,
        .mock-card {
            transition: transform 0.16s ease-out;
        }

        /* subtle photo/card zoom (transform-only) */
        .hero-right img, .showcase-img img, .about-img-box img {
            transition: transform 0.5s cubic-bezier(0.22, 0.61, 0.36, 1);
        }
        .hero-right:hover img, .showcase-img:hover img, .about-img-box:hover img {
            transform: scale3d(1.03, 1.03, 1);
        }

        /* accessibility: disable all motion if the user prefers */
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            .pre-anim { opacity: 1; will-change: auto; }
            .anim-in { animation: none; }
            .btn-brutal, .navbar-brutal .nav-link, .tool-card, .feat-icon,
            .mock-card, .hero-right img, .showcase-img img, .about-img-box img {
                transition: none;
            }
        }
    </style>
</head>

<body>
    <!-- NAVBAR (Bootstrap 5) -->
    <nav class="navbar navbar-expand-md navbar-brutal px-3 px-md-5 py-0">
        <div class="container-fluid px-0">
            <a class="navbar-brand fw-800 fs-5" href="#">StudyMind AI</a>
            <button class="navbar-toggler border-0 rounded-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navBrutal" aria-controls="navBrutal" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navBrutal">
                <ul class="navbar-nav me-auto mb-2 mb-md-0 gap-2 mt-2 mt-md-0">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact-us">Contact Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/features">Features</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li> --}}

                    <!-- Auth Links - Show if authenticated -->
                @auth
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
                @endauth
            </ul>

            <!-- Right side - Auth buttons -->
            <div class="d-flex gap-2 align-items-center">
                @auth
                    <span class="me-2" style="font-weight: 600; font-size: 0.85rem; color: var(--black);">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-brutal btn-brutal-outline" style="padding: 6px 16px; font-size: 0.8rem;">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-brutal btn-brutal-outline" style="padding: 6px 16px; font-size: 0.8rem;">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-brutal btn-brutal-primary" style="padding: 6px 16px; font-size: 0.8rem;">
                        Register
                    </a>
                @endauth
            </div>
                <form class="d-flex" action="/Search" method="GET">
                    <input class="form-control rounded-0" type="search" name="q" placeholder="Search topics...">
                    <button class="btn-search" type="submit">Go</button>
                </form>
            </div>
        </div>
    </nav>

    @yield('content')
    {{-- main --}}

    <!-- FOOTER -->
    <footer class="footer-brutal d-flex flex-wrap align-items-center justify-content-between">
        <span class="foot-logo">StudyMind AI</span>
        <p class="mb-0" style="color:#888;font-size:0.82rem;">&copy; 2026 — Built for students, by students.</p>
        <div class="d-flex gap-4">
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
    </footer>

    <!-- Bootstrap JS (for toggler) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Motion system: scroll reveals + staggered entrances + stat count-ups -->
    <script>
        (function () {
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
            if (!('IntersectionObserver' in window)) return;

            // never animate inside the dashboard app
            if (document.querySelector('.dashboard-wrapper')) return;

            var selectors = [
                '.feat-card', '.tool-card', '.stat-box',
                '.showcase-text', '.showcase-img',
                '.about-text-box', '.about-img-box',
                '.hero-left', '.hero-right',
                '.team-card', '.value-card', '.contact-card', '.feature-card',
                '.auth-card', '.brutal-section-label', '.mock-card'
            ];

            var els = document.querySelectorAll(selectors.join(','));

            // hide before reveal + compute per-parent stagger
            var parentCounts = new Map();
            els.forEach(function (el) {
                var p = el.parentElement;
                var i = parentCounts.get(p) || 0;
                parentCounts.set(p, i + 1);
                el.dataset.revealDelay = Math.min(i, 5) * 60; // ms
                el.classList.add('pre-anim');
            });

            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (e) {
                    if (!e.isIntersecting) return;
                    var el = e.target;
                    el.style.animationDelay = (el.dataset.revealDelay || 0) + 'ms';
                    el.classList.add('anim-in');
                    el.addEventListener('animationend', function () {
                        el.classList.add('anim-done');
                    }, { once: true });
                    io.unobserve(el);
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });

            els.forEach(function (el) { io.observe(el); });

            // Count-up for stat numbers like "10K+", "94%", "3x"
            var statIO = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (!entry.isIntersecting) return;
                    var el = entry.target;
                    statIO.unobserve(el);
                    var raw = el.textContent.trim();
                    var m = raw.match(/^(\d+(?:\.\d+)?)(.*)$/);
                    if (!m) return;
                    var target = parseFloat(m[1]);
                    var suffix = m[2] || '';
                    var dur = 1200, start = null;
                    function step(ts) {
                        if (!start) start = ts;
                        var p = Math.min((ts - start) / dur, 1);
                        p = 1 - Math.pow(1 - p, 3); // ease-out cubic
                        el.textContent = Math.round(target * p) + suffix;
                        if (p < 1) requestAnimationFrame(step);
                    }
                    requestAnimationFrame(step);
                });
            }, { threshold: 0.4 });

            document.querySelectorAll('.stat-num').forEach(function (el) { statIO.observe(el); });
        })();
    </script>
</body>

</html>
