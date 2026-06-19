<div class="sidebar-wrapper p-3 p-md-4">
    <div class="sidebar-brand mb-4">
        <h4 style="color: var(--brown); font-weight: 800; letter-spacing: -0.5px;">
            <i class="bi bi-brain"></i> StudyMind
        </h4>
        <span style="color: #888; font-size: 0.75rem; text-transform: uppercase; letter-spacing: 1px;">Dashboard</span>
    </div>

    <ul class="nav flex-column" style="gap: 4px;">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
               href="{{ route('dashboard') }}"
               style="color: {{ request()->routeIs('dashboard') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('dashboard') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-house-door"></i> Overview
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.study-plan') ? 'active' : '' }}" 
               href="{{ route('dashboard.study-plan') }}"
               style="color: {{ request()->routeIs('dashboard.study-plan') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('dashboard.study-plan') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-calendar-check"></i> Study Plan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.progress') ? 'active' : '' }}" 
               href="{{ route('dashboard.progress') }}"
               style="color: {{ request()->routeIs('dashboard.progress') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('dashboard.progress') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-graph-up"></i> Progress
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.calendar') ? 'active' : '' }}" 
               href="{{ route('dashboard.calendar') }}"
               style="color: {{ request()->routeIs('dashboard.calendar') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('dashboard.calendar') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-calendar3"></i> Calendar
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.materials') ? 'active' : '' }}" 
               href="{{ route('dashboard.materials') }}"
               style="color: {{ request()->routeIs('dashboard.materials') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('dashboard.materials') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-folder2"></i> Materials
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.profile') ? 'active' : '' }}" 
               href="{{ route('dashboard.profile') }}"
               style="color: {{ request()->routeIs('dashboard.profile') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('dashboard.profile') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-person"></i> Profile
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard.settings') ? 'active' : '' }}" 
               href="{{ route('dashboard.settings') }}"
               style="color: {{ request()->routeIs('dashboard.settings') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('dashboard.settings') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-gear"></i> Settings
            </a>
        </li>
    </ul>

    <div class="sidebar-footer mt-4" style="border-top: 2px solid #222; padding-top: 16px;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background: none; border: var(--border); padding: 10px 16px; width: 100%; color: #aaa; font-weight: 700; font-size: 0.85rem; text-align: left; transition: all 0.1s;">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
</div>

<style>
    .sidebar-wrapper .nav-link:hover {
        background: #222 !important;
        color: var(--brown) !important;
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow);
    }
    .sidebar-wrapper .nav-link.active {
        background: #222 !important;
        color: var(--brown) !important;
    }
</style>