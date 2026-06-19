@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid px-0">
        <div class="row no-gap g-0">
            <div class="col-md-3 col-lg-2 dashboard-sidebar">
                @include('dashboard.partials.sidebar')
            </div>
            <div class="col-md-9 col-lg-10 dashboard-main">
                @include('dashboard.partials.header')
                <div class="dashboard-content p-4 p-md-5">
                    <h2 class="fw-800 mb-4">📝 Your Study Plan</h2>
                    
                    <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; margin-bottom: 24px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
                            <div>
                                <h4 style="font-weight: 800;">Weekly Overview</h4>
                                <p style="color: #666; margin: 0;">Week of January 15-21, 2026</p>
                            </div>
                            <button class="btn btn-brutal btn-brutal-primary" style="font-size: 0.85rem; padding: 8px 20px;">
                                <i class="bi bi-plus"></i> Generate New Plan
                            </button>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-lg-8">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h4 style="font-weight: 800; margin-bottom: 16px;">Weekly Schedule</h4>
                                <div class="table-responsive">
                                    <table class="table" style="border: var(--border);">
                                        <thead style="background: var(--black); color: var(--brown);">
                                            <tr>
                                                <th style="border: var(--border); padding: 12px;">Day</th>
                                                <th style="border: var(--border); padding: 12px;">Subjects</th>
                                                <th style="border: var(--border); padding: 12px;">Hours</th>
                                                <th style="border: var(--border); padding: 12px;">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="border: var(--border); padding: 12px; font-weight: 700;">Monday</td>
                                                <td style="border: var(--border); padding: 12px;">Math, Physics</td>
                                                <td style="border: var(--border); padding: 12px;">4.5</td>
                                                <td style="border: var(--border); padding: 12px;">
                                                    <span style="background: var(--green); padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">Complete</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: var(--border); padding: 12px; font-weight: 700;">Tuesday</td>
                                                <td style="border: var(--border); padding: 12px;">Chemistry, English</td>
                                                <td style="border: var(--border); padding: 12px;">3.5</td>
                                                <td style="border: var(--border); padding: 12px;">
                                                    <span style="background: var(--green); padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">Complete</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: var(--border); padding: 12px; font-weight: 700;">Wednesday</td>
                                                <td style="border: var(--border); padding: 12px;">Math, Chemistry</td>
                                                <td style="border: var(--border); padding: 12px;">4.0</td>
                                                <td style="border: var(--border); padding: 12px;">
                                                    <span style="background: var(--pink); padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700; color: white;">In Progress</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: var(--border); padding: 12px; font-weight: 700;">Thursday</td>
                                                <td style="border: var(--border); padding: 12px;">Physics, English</td>
                                                <td style="border: var(--border); padding: 12px;">3.0</td>
                                                <td style="border: var(--border); padding: 12px;">
                                                    <span style="background: #eee; padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">Upcoming</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border: var(--border); padding: 12px; font-weight: 700;">Friday</td>
                                                <td style="border: var(--border); padding: 12px;">Review & Practice</td>
                                                <td style="border: var(--border); padding: 12px;">2.5</td>
                                                <td style="border: var(--border); padding: 12px;">
                                                    <span style="background: #eee; padding: 2px 12px; border: var(--border); font-size: 0.75rem; font-weight: 700;">Upcoming</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h4 style="font-weight: 800; margin-bottom: 16px;">📊 Weekly Stats</h4>
                                <div style="margin-bottom: 12px;">
                                    <span style="display: block; font-weight: 600; font-size: 0.85rem;">Total Study Hours</span>
                                    <span style="font-weight: 800; font-size: 1.5rem;">17.5 / 22</span>
                                    <div style="width: 100%; height: 8px; background: #eee; border: var(--border); margin-top: 4px;">
                                        <div style="width: 80%; height: 100%; background: var(--blue);"></div>
                                    </div>
                                </div>
                                <div style="margin-bottom: 12px;">
                                    <span style="display: block; font-weight: 600; font-size: 0.85rem;">Completed Sessions</span>
                                    <span style="font-weight: 800; font-size: 1.5rem;">8 / 10</span>
                                    <div style="width: 100%; height: 8px; background: #eee; border: var(--border); margin-top: 4px;">
                                        <div style="width: 80%; height: 100%; background: var(--green);"></div>
                                    </div>
                                </div>
                                <div>
                                    <span style="display: block; font-weight: 600; font-size: 0.85rem;">Productivity Score</span>
                                    <span style="font-weight: 800; font-size: 1.5rem;">92%</span>
                                    <div style="width: 100%; height: 8px; background: #eee; border: var(--border); margin-top: 4px;">
                                        <div style="width: 92%; height: 100%; background: var(--brown);"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection