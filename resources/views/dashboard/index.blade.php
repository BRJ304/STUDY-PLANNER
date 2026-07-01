@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid px-0">
        <div class="row no-gap g-0">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 dashboard-sidebar">
                @include('dashboard.sidebar')
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 dashboard-main">
                @include('dashboard.header')
                
                <div class="dashboard-content p-4 p-md-5">
                    <!-- Welcome Section -->
                    <div class="welcome-section mb-4">
                        <h1 class="fw-800" style="font-size: 2rem; letter-spacing: -0.5px;">
                            Welcome back, {{ Auth::user()->name }}! 👋
                        </h1>
                        <p style="color: #555; font-size: 1.05rem;">Here's your study overview for today.</p>
                    </div>

                    <!-- Stats Cards -->
                    <div class="row g-4 mb-4">
                        <div class="col-md-3 col-sm-6">
                            <div class="stat-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 20px;">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <div>
                                        <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: #666; letter-spacing: 0.5px;">Study Hours</span>
                                        <h3 style="font-weight: 800; font-size: 2rem; margin: 4px 0;">{{ $stats['study_hours'] }}</h3>
                                        <span style="font-size: 0.8rem; color: var(--green); font-weight: 600;">Total hours studied</span>
                                    </div>
                                    <div style="width: 48px; height: 48px; background: var(--blue); border: var(--border); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                        📚
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="stat-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 20px;">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <div>
                                        <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: #666; letter-spacing: 0.5px;">Topics Mastered</span>
                                        <h3 style="font-weight: 800; font-size: 2rem; margin: 4px 0;">{{ $stats['topics_mastered'] }}</h3>
                                        <span style="font-size: 0.8rem; color: var(--green); font-weight: 600;">Completed topics</span>
                                    </div>
                                    <div style="width: 48px; height: 48px; background: var(--green); border: var(--border); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                        ✅
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="stat-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 20px;">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <div>
                                        <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: #666; letter-spacing: 0.5px;">Exam Readiness</span>
                                        <h3 style="font-weight: 800; font-size: 2rem; margin: 4px 0;">{{ $stats['exam_readiness'] }}%</h3>
                                        <span style="font-size: 0.8rem; color: var(--pink); font-weight: 600;">Estimated readiness</span>
                                    </div>
                                    <div style="width: 48px; height: 48px; background: var(--pink); border: var(--border); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                        🎯
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="stat-card" style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 20px;">
                                <div style="display: flex; align-items: center; justify-content: space-between;">
                                    <div>
                                        <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 700; color: #666; letter-spacing: 0.5px;">Study Streak</span>
                                        <h3 style="font-weight: 800; font-size: 2rem; margin: 4px 0;">{{ $stats['study_streak'] }}</h3>
                                        <span style="font-size: 0.8rem; color: var(--brown); font-weight: 600;">🔥 Days in a row</span>
                                    </div>
                                    <div style="width: 48px; height: 48px; background: var(--brown); border: var(--border); display: flex; align-items: center; justify-content: center; font-size: 1.5rem;">
                                        🔥
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Today's Schedule & Progress -->
                    <div class="row g-4">
                        <div class="col-lg-7">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                                    <h4 style="font-weight: 800; margin: 0;">📅 Today's Schedule</h4>
                                    <a href="{{ route('study-plan') }}" style="color: var(--brown); font-weight: 700; text-decoration: none; font-size: 0.85rem;">
                                        View All →
                                    </a>
                                </div>
                                <div class="schedule-list">
                                    @foreach($schedule as $item)
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 12px 0; border-bottom: 1px solid #eee;">
                                        <span style="font-weight: 800; color: var(--brown); min-width: 80px;">{{ $item['time'] }}</span>
                                        <span style="font-weight: 600;">{{ $item['subject'] }}</span>
                                        <span style="margin-left: auto; background: {{ strtolower($item['status']) == 'completed' ? 'var(--green)' : (strtolower($item['status']) == 'in progress' ? 'var(--blue)' : '#eee') }}; padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">{{ $item['status'] }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h4 style="font-weight: 800; margin-bottom: 16px;">📊 Progress Overview</h4>
                                <div class="progress-items">
                                    @foreach($progress as $item)
                                    <div style="margin-bottom: 16px;">
                                        <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                            <span>{{ $item['subject'] }}</span>
                                            <span>{{ $item['progress'] }}%</span>
                                        </div>
                                        <div style="width: 100%; height: 12px; background: #eee; border: var(--border); margin-top: 4px;">
                                            <div style="width: {{ $item['progress'] }}%; height: 100%; background: {{ $loop->iteration % 4 == 0 ? 'var(--green)' : ($loop->iteration % 3 == 0 ? 'var(--brown)' : ($loop->iteration % 2 == 0 ? 'var(--pink)' : 'var(--blue)')) }};"></div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <a href="{{ route('progress') }}" class="btn btn-brutal btn-brutal-secondary w-100 mt-3" style="font-size: 0.85rem; padding: 10px;">
                                    View Detailed Analytics
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="row g-4 mt-4">
                        <div class="col-md-4">
                            <a href="{{ route('study-plan') }}" style="text-decoration: none; color: inherit;">
                                <div style="background: var(--blue); border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center; transition: transform 0.1s, box-shadow 0.1s;">
                                    <span style="font-size: 2.5rem; display: block;">📝</span>
                                    <h5 style="font-weight: 800; margin: 8px 0; color: white;">Study Plan</h5>
                                    <p style="color: #e0e0e0; font-size: 0.85rem; margin: 0;">View your AI-generated schedule</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('materials') }}" style="text-decoration: none; color: inherit;">
                                <div style="background: var(--green); border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center; transition: transform 0.1s, box-shadow 0.1s;">
                                    <span style="font-size: 2.5rem; display: block;">📂</span>
                                    <h5 style="font-weight: 800; margin: 8px 0; color: var(--black);">Materials</h5>
                                    <p style="color: #333; font-size: 0.85rem; margin: 0;">Upload and manage study materials</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('progress') }}" style="text-decoration: none; color: inherit;">
                                <div style="background: var(--pink); border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center; transition: transform 0.1s, box-shadow 0.1s;">
                                    <span style="font-size: 2.5rem; display: block;">📊</span>
                                    <h5 style="font-weight: 800; margin: 8px 0; color: white;">Analytics</h5>
                                    <p style="color: #f0f0f0; font-size: 0.85rem; margin: 0;">Track your performance</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .dashboard-sidebar {
        background: var(--black);
        min-height: 100vh;
        border-right: 3px solid var(--black);
        padding: 0;
    }
    .dashboard-main {
        background: #f5f0e8;
        min-height: 100vh;
    }
    .stat-card:hover {
        transform: translate(-2px, -2px);
        box-shadow: var(--shadow-lg);
        transition: transform 0.1s, box-shadow 0.1s;
    }
    .dashboard-content a [style*="background:"]:hover {
        transform: translate(-3px, -3px);
        box-shadow: var(--shadow-lg);
        transition: transform 0.1s, box-shadow 0.1s;
    }
    @media (max-width: 768px) {
        .dashboard-sidebar {
            min-height: auto;
            border-right: none;
            border-bottom: 3px solid var(--black);
        }
    }
</style>
@endsection