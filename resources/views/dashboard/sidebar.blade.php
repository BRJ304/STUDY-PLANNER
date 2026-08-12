<div class="sidebar-wrapper p-3 p-md-4">
    <div class="sidebar-brand mb-4 text-center">
        <h4 style="color: var(--black); font-weight: 800; letter-spacing: -0.5px; margin: 0;">
            Dashboard
        </h4>
    </div>

    <ul class="nav flex-column" style="gap: 6px;">
        <li class="nav-item">
            <a class="nav-link sb-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
               href="{{ route('dashboard') }}">
                <i class="bi bi-house-door"></i> Overview
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link sb-link {{ request()->routeIs('study-plan') ? 'active' : '' }}"
               href="{{ route('study-plan') }}">
                <i class="bi bi-calendar-check"></i> Study Plan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link sb-link {{ request()->routeIs('progress') ? 'active' : '' }}"
               href="{{ route('progress') }}">
                <i class="bi bi-graph-up"></i> Progress
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link sb-link {{ request()->routeIs('materials') ? 'active' : '' }}"
               href="{{ route('materials') }}">
                <i class="bi bi-folder2"></i> Materials
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link sb-link {{ request()->routeIs('profile') ? 'active' : '' }}"
               href="{{ route('profile') }}">
                <i class="bi bi-person"></i> Profile
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link sb-link {{ request()->routeIs('settings') ? 'active' : '' }}"
               href="{{ route('settings') }}">
                <i class="bi bi-gear"></i> Settings
            </a>
        </li>
    </ul>

    <div class="sidebar-footer mt-auto pt-4">
        <a href="/" class="sb-home d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-arrow-left"></i> Home page
        </a>

        @auth
        <div class="sb-badge mb-2">
            <i class="bi bi-check-lg"></i> Signed in as {{ Auth::user()->name }}
        </div>
        @endauth

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="sb-logout">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>

        <p class="sb-caption mt-3 mb-0">StudyMind AI · built for students, by students.</p>
    </div>
</div>

<style>
    /* ── sidebar shell (reference: solid accent panel, black right border) ── */
    .sidebar-wrapper {
        background: var(--brown); /* #B8E3E9 */
        border-right: var(--border);
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    /* ── nav items ── */
    .sidebar-wrapper .sb-link {
        color: var(--black);
        background: transparent;
        border: 2.5px solid transparent;
        padding: 12px 16px;
        font-weight: 700;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: transform 0.14s ease, box-shadow 0.14s ease,
                    background 0.14s ease, color 0.14s ease, border-color 0.14s ease;
    }

    /* hover — white card with border + hard shadow (like "Tasks" in reference) */
    .sidebar-wrapper .sb-link:hover {
        background: white;
        color: var(--black);
        border: var(--border);
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow);
    }

    /* active — bright white card, black text, hard shadow */
    .sidebar-wrapper .sb-link.active {
        background: white;
        color: var(--black);
        border: var(--border);
        box-shadow: var(--shadow);
    }

    .sidebar-wrapper .sb-link.active:hover {
        background: white;
        color: var(--black);
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow-lg);
    }

    /* ── footer block ── */
    .sidebar-wrapper .sb-home {
        color: var(--black);
        font-weight: 800;
        font-size: 0.95rem;
        text-decoration: none;
        transition: transform 0.14s ease;
    }
    .sidebar-wrapper .sb-home:hover { transform: translateX(-4px); color: var(--black); }

    .sidebar-wrapper .sb-badge {
        background: rgba(255, 255, 255, 0.65);
        border: 2px solid var(--black);
        padding: 8px 12px;
        font-weight: 800;
        font-size: 0.72rem;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        color: var(--black);
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .sidebar-wrapper .sb-logout {
        background: none;
        border: var(--border);
        padding: 10px 16px;
        width: 100%;
        color: var(--black);
        font-weight: 700;
        font-size: 0.85rem;
        text-align: left;
        transition: transform 0.14s ease, box-shadow 0.14s ease, background 0.14s ease;
    }
    .sidebar-wrapper .sb-logout:hover {
        background: white;
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow);
    }

    .sidebar-wrapper .sb-caption {
        color: rgba(10, 10, 10, 0.55);
        font-size: 0.78rem;
        font-weight: 600;
        line-height: 1.5;
    }
</style>