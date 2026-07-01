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
                            {{-- Welcome back, {{ Auth::user()->name }}! 👋 --}}
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
                                        <h3 style="font-weight: 800; font-size: 2rem; margin: 4px 0;">24.5</h3>
                                        <span style="font-size: 0.8rem; color: var(--green); font-weight: 600;">↑ 12% this week</span>
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
                                        <h3 style="font-weight: 800; font-size: 2rem; margin: 4px 0;">18</h3>
                                        <span style="font-size: 0.8rem; color: var(--green); font-weight: 600;">↑ 5 this week</span>
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
                                        <h3 style="font-weight: 800; font-size: 2rem; margin: 4px 0;">87%</h3>
                                        <span style="font-size: 0.8rem; color: var(--pink); font-weight: 600;">↑ 8% this week</span>
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
                                        <h3 style="font-weight: 800; font-size: 2rem; margin: 4px 0;">12</h3>
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
                                    <a href="#" style="color: var(--brown); font-weight: 700; text-decoration: none; font-size: 0.85rem;">
                                        View All →
                                    </a>
                                </div>
                                <div class="schedule-list">
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 12px 0; border-bottom: 1px solid #eee;">
                                        <span style="font-weight: 800; color: var(--brown); min-width: 60px;">9:00 AM</span>
                                        <span style="font-weight: 600;">Mathematics - Chapter 5</span>
                                        <span style="margin-left: auto; background: var(--green); padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">In Progress</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 12px 0; border-bottom: 1px solid #eee;">
                                        <span style="font-weight: 800; color: var(--brown); min-width: 60px;">10:30 AM</span>
                                        <span style="font-weight: 600;">Physics - Mechanics</span>
                                        <span style="margin-left: auto; background: #eee; padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">Upcoming</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 12px 0; border-bottom: 1px solid #eee;">
                                        <span style="font-weight: 800; color: var(--brown); min-width: 60px;">1:00 PM</span>
                                        <span style="font-weight: 600;">Chemistry - Organic</span>
                                        <span style="margin-left: auto; background: #eee; padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">Upcoming</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 12px 0; border-bottom: 1px solid #eee;">
                                        <span style="font-weight: 800; color: var(--brown); min-width: 60px;">3:00 PM</span>
                                        <span style="font-weight: 600;">English - Literature</span>
                                        <span style="margin-left: auto; background: #eee; padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">Upcoming</span>
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 12px; padding: 12px 0;">
                                        <span style="font-weight: 800; color: var(--brown); min-width: 60px;">5:00 PM</span>
                                        <span style="font-weight: 600;">Review & Practice</span>
                                        <span style="margin-left: auto; background: #eee; padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">Upcoming</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h4 style="font-weight: 800; margin-bottom: 16px;">📊 Progress Overview</h4>
                                <div class="progress-items">
                                    <div style="margin-bottom: 16px;">
                                        <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                            <span>Mathematics</span>
                                            <span>75%</span>
                                        </div>
                                        <div style="width: 100%; height: 12px; background: #eee; border: var(--border); margin-top: 4px;">
                                            <div style="width: 75%; height: 100%; background: var(--blue);"></div>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: 16px;">
                                        <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                            <span>Physics</span>
                                            <span>60%</span>
                                        </div>
                                        <div style="width: 100%; height: 12px; background: #eee; border: var(--border); margin-top: 4px;">
                                            <div style="width: 60%; height: 100%; background: var(--pink);"></div>
                                        </div>
                                    </div>
                                    <div style="margin-bottom: 16px;">
                                        <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                            <span>Chemistry</span>
                                            <span>45%</span>
                                        </div>
                                        <div style="width: 100%; height: 12px; background: #eee; border: var(--border); margin-top: 4px;">
                                            <div style="width: 45%; height: 100%; background: var(--brown);"></div>
                                        </div>
                                    </div>
                                    <div>
                                        <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                            <span>English</span>
                                            <span>80%</span>
                                        </div>
                                        <div style="width: 100%; height: 12px; background: #eee; border: var(--border); margin-top: 4px;">
                                            <div style="width: 80%; height: 100%; background: var(--green);"></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-brutal btn-brutal-secondary w-100 mt-3" style="font-size: 0.85rem; padding: 10px;">
                                    View Detailed Analytics
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="row g-4 mt-4">
                        <div class="col-md-4">
                            <a href="#" style="text-decoration: none; color: inherit;">
                                <div style="background: var(--blue); border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center; transition: transform 0.1s, box-shadow 0.1s;">
                                    <span style="font-size: 2.5rem; display: block;">📝</span>
                                    <h5 style="font-weight: 800; margin: 8px 0; color: white;">Study Plan</h5>
                                    <p style="color: #e0e0e0; font-size: 0.85rem; margin: 0;">View your AI-generated schedule</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#" style="text-decoration: none; color: inherit;">
                                <div style="background: var(--green); border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center; transition: transform 0.1s, box-shadow 0.1s;">
                                    <span style="font-size: 2.5rem; display: block;">📂</span>
                                    <h5 style="font-weight: 800; margin: 8px 0; color: var(--black);">Materials</h5>
                                    <p style="color: #333; font-size: 0.85rem; margin: 0;">Upload and manage study materials</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#" style="text-decoration: none; color: inherit;">
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