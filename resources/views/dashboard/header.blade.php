<div class="dashboard-header p-3 p-md-4" style="background: #f5f0e8; border-bottom: var(--border);">
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-brutal btn-brutal-outline d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#mobileSidebar">
                <i class="bi bi-list"></i>
            </button>
            <span style="font-weight: 600; font-size: 0.85rem; color: #666;">
                <i class="bi bi-clock"></i> Last study session: 2 hours ago
            </span>
        </div>
        <div class="d-flex align-items-center gap-3">
            <div class="notification-bell" style="position: relative; cursor: pointer;">
                <i class="bi bi-bell" style="font-size: 1.3rem;"></i>
                <span style="position: absolute; top: -4px; right: -4px; background: var(--pink); border: var(--border); padding: 0 6px; font-size: 0.65rem; font-weight: 800; border-radius: 0;">
                    3
                </span>
            </div>
            <div class="user-info d-flex align-items-center gap-2">
                {{-- <div style="width: 36px; height: 36px; background: var(--brown); border: var(--border); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 800; font-size: 0.9rem;">
                    {{ substr(Auth::user()->name, 0, 2) }}
                </div>
                <span style="font-weight: 600; font-size: 0.9rem; display: none; sm:display: inline;">
                    {{ Auth::user()->name }}
                </span> --}}
            </div>
        </div>
    </div>
</div>

<!-- Mobile Sidebar -->
<div class="collapse d-md-none" id="mobileSidebar">
    <div style="background: var(--black); padding: 16px; border-bottom: var(--border);">
        @include('dashboard.sidebar')
    </div>
</div>