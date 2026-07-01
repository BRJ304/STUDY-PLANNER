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
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background: #f5f0e8;
            color: #0a0a0a;
        }

        :root {
            --black: #0a0a0a;
            --brown: #8b4513;
            --pink: #FF6BB5;
            --blue: #5B8DEF;
            --green: #3DDC84;
            --shadow: 4px 4px 0px var(--black);
            --shadow-lg: 6px 6px 0px var(--black);
            --border: 2.5px solid var(--black);
        }

        /* ── brutalist helpers ── */
        .brutal-border {
            border: var(--border);
        }

        .brutal-shadow {
            box-shadow: var(--shadow);
        }

        .brutal-shadow-lg {
            box-shadow: var(--shadow-lg);
        }

        .brutal-transition {
            transition: transform 0.1s, box-shadow 0.1s;
        }

        .brutal-hover:hover {
            transform: translate(-2px, -2px);
            box-shadow: var(--shadow-lg);
        }

        .bg-brutal-black {
            background: var(--black);
        }

        .bg-brutal-brown {
            background: var(--brown);
        }

        .bg-brutal-pink {
            background: var(--pink);
        }

        .bg-brutal-blue {
            background: var(--blue);
        }

        .bg-brutal-green {
            background: var(--green);
        }

        .text-brutal-brown {
            color: var(--brown);
        }

        .text-brutal-black {
            color: var(--black);
        }

        .border-brutal {
            border: var(--border);
        }

        /* ── Nav ── */
        .navbar-brutal {
            background: var(--brown);
            border-bottom: 3px solid var(--black);
            min-height: 64px;
        }

        .navbar-brutal .navbar-brand {
            font-weight: 800;
            letter-spacing: -0.5px;
            color: var(--black);
        }

        .navbar-brutal .nav-link {
            background: white;
            border: var(--border);
            box-shadow: var(--shadow);
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 8px 18px;
            margin-right: 8px;
            color: var(--black);
            transition: transform 0.1s, box-shadow 0.1s;
        }

        .navbar-brutal .nav-link:hover {
            transform: translate(-2px, -2px);
            box-shadow: var(--shadow-lg);
            color: var(--black);
        }

        .navbar-brutal .form-control {
            border: var(--border);
            border-right: none;
            font-weight: 600;
            font-size: 0.85rem;
            border-radius: 0;
            background: white;
            font-family: inherit;
            width: 200px;
        }

        .navbar-brutal .btn-search {
            background: var(--black);
            color: var(--brown);
            border: var(--border);
            font-weight: 800;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 8px 16px;
            border-radius: 0;
            font-family: inherit;
        }

        .navbar-brutal .btn-search:hover {
            background: #222;
            color: var(--brown);
        }

        /* ── Buttons ── */
        .btn-brutal {
            font-family: inherit;
            font-weight: 800;
            font-size: 0.95rem;
            border: var(--border);
            box-shadow: var(--shadow);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px 28px;
            border-radius: 0;
            transition: transform 0.1s, box-shadow 0.1s;
        }

        .btn-brutal:hover {
            transform: translate(-2px, -2px);
            box-shadow: var(--shadow-lg);
        }

        .btn-brutal-primary {
            background: var(--black);
            color: var(--brown);
        }

        .btn-brutal-secondary {
            background: var(--brown);
            color: var(--black);
        }

        .btn-brutal-outline {
            background: white;
            color: var(--black);
        }

        /* ── hero ── */
        .hero-left {
            background: white;
            padding: 60px 50px;
        }

        .hero-badge {
            background: var(--brown);
            border: var(--border);
            padding: 6px 16px;
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: fit-content;
        }

        .hero-left h1 {
            font-size: 3.2rem;
            font-weight: 800;
            letter-spacing: -1px;
            line-height: 1.05;
        }

        .hero-left h1 span {
            background: var(--brown);
            padding: 0 4px;
        }

        .hero-right {
            background: var(--blue);
            overflow: hidden;
            min-height: 380px;
        }

        .hero-right img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            mix-blend-mode: multiply;
            filter: grayscale(20%);
        }

        /* ── feature cards ── */
        .feat-icon {
            width: 52px;
            height: 52px;
            border: var(--border);
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .feat-card {
            padding: 40px 30px;
        }

        .feat-card h3 {
            font-size: 1.1rem;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .feat-card p {
            font-size: 0.88rem;
            line-height: 1.8;
            color: #444;
        }

        /* ── showcase ── */
        .showcase-img {
            min-height: 260px;
            overflow: hidden;
        }

        .showcase-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(15%);
        }

        .showcase-text {
            background: var(--brown);
            padding: 50px 45px;
        }

        .showcase-text h2 {
            font-size: 2.2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        /* ── stat boxes ── */
        .stat-box {
            padding: 40px;
            text-align: center;
        }

        .stat-num {
            font-size: 3.5rem;
            font-weight: 800;
            letter-spacing: -2px;
            display: block;
        }

        .stat-label {
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #333;
        }

        /* ── about ── */
        .about-img-box {
            min-height: 220px;
            overflow: hidden;
        }

        .about-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .about-text-box {
            background: var(--black);
            color: white;
            padding: 50px 40px;
        }

        .about-text-box h2 {
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .about-text-box h2 span {
            color: var(--brown);
        }

        .about-text-box p {
            color: #ccc;
            line-height: 1.85;
        }

        /* ── tools ── */
        .tool-card {
            padding: 28px 24px;
            border: 2.5px solid var(--black);
            background: white;
            transition: transform 0.1s, box-shadow 0.1s, background 0.1s;
            cursor: default;
            height: 100%;
        }

        .tool-card:hover {
            background: var(--brown);
            transform: translate(-3px, -3px);
            box-shadow: var(--shadow-lg);
            z-index: 2;
            position: relative;
        }

        .tool-card .tool-icon {
            font-size: 1.8rem;
            display: block;
            margin-bottom: 14px;
        }

        .tool-card h4 {
            font-weight: 800;
        }

        .tool-card p {
            font-size: 0.82rem;
            line-height: 1.7;
            color: #555;
        }

        .tool-card:hover p {
            color: #111;
        }

        /* ── footer ── */
        .footer-brutal {
            background: var(--black);
            color: white;
            padding: 30px 40px;
        }

        .footer-brutal .foot-logo {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--brown);
        }

        .footer-brutal a {
            color: #aaa;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
            font-size: 0.82rem;
        }

        .footer-brutal a:hover {
            color: var(--brown);
        }

        /* ── responsive tweaks ── */
        @media (max-width: 768px) {
            .hero-left {
                padding: 40px 24px;
            }

            .hero-left h1 {
                font-size: 2.2rem;
            }

            .showcase-text {
                padding: 30px 24px;
            }

            .about-text-box {
                padding: 30px 24px;
            }

            .navbar-brutal .form-control {
                width: 130px;
            }

            .stat-box {
                padding: 28px;
            }

            .feat-card {
                padding: 30px 20px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brutal .form-control {
                width: 100px;
            }
        }

        /* utility to keep borders in grid */
        .border-right-brutal {
            border-right: 3px solid var(--black);
        }

        .border-bottom-brutal {
            border-bottom: 3px solid var(--black);
        }

        .border-left-brutal {
            border-left: 3px solid var(--black);
        }

        .border-brutal-all {
            border: 3px solid var(--black);
        }

        .border-brutal-bottom {
            border-bottom: 3px solid var(--black);
        }

        .brutal-section-label {
            background: var(--black);
            color: var(--brown);
            padding: 18px 40px;
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 3px;
            border-bottom: 3px solid var(--black);
        }

        .no-gap>[class*="col-"] {
            padding-left: 0;
            padding-right: 0;
        }

        .no-gap .row {
            margin-left: 0;
            margin-right: 0;
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
                    <!-- When logged in, show user info and logout -->
                    <span class="text-white me-2" style="font-weight: 600; font-size: 0.85rem;">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </span>
                    <form method="get" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-brutal btn-brutal-outline" style="padding: 6px 16px; font-size: 0.8rem;">
                            Logout
                        </button>
                    </form>
                @else
                    <!-- When logged out, show login/register -->
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
</body>

</html>