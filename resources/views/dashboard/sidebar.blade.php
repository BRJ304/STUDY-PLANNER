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
            <a class="nav-link {{ request()->routeIs('study-plan') ? 'active' : '' }}" 
               href="{{ route('study-plan') }}"
               style="color: {{ request()->routeIs('study-plan') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('study-plan') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-calendar-check"></i> Study Plan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('progress') ? 'active' : '' }}" 
               href="{{ route('progress') }}"
               style="color: {{ request()->routeIs('progress') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('progress') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-graph-up"></i> Progress
            </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('materials') ? 'active' : '' }}" 
               href="{{ route('materials') }}"
               style="color: {{ request()->routeIs('materials') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('materials') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-folder2"></i> Materials
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" 
               href="{{ route('profile') }}"
               style="color: {{ request()->routeIs('profile') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('profile') ? '#222' : 'transparent' }};
                      border: var(--border); 
                      padding: 12px 16px; 
                      font-weight: 700; 
                      font-size: 0.85rem;
                      transition: all 0.1s;">
                <i class="bi bi-person"></i> Profile
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('settings') ? 'active' : '' }}" 
               href="{{ route('settings') }}"
               style="color: {{ request()->routeIs('settings') ? 'var(--brown)' : '#aaa' }}; 
                      background: {{ request()->routeIs('settings') ? '#222' : 'transparent' }};
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
        <form method="GET" action="{{ route('logout') }}">
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