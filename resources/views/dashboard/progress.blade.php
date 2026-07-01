@extends('layouts.app')

@section('content')
<div class="dashboard-wrapper">
    <div class="container-fluid px-0">
        <div class="row no-gap g-0">
            <div class="col-md-3 col-lg-2 dashboard-sidebar">
                @include('dashboard.sidebar')
            </div>
            <div class="col-md-9 col-lg-10 dashboard-main">
                @include('dashboard.header')
                <div class="dashboard-content p-4 p-md-5">
                    <h2 class="fw-800 mb-4">📊 Progress Analytics</h2>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h4 style="font-weight: 800; margin-bottom: 16px;">📈 Performance Overview</h4>
                                <div style="height: 200px; display: flex; align-items: flex-end; gap: 12px; padding: 12px 0;">
                                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                        <div style="width: 100%; height: 60px; background: var(--blue); border: var(--border);"></div>
                                        <span style="font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Week 1</span>
                                    </div>
                                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                        <div style="width: 100%; height: 85px; background: var(--blue); border: var(--border);"></div>
                                        <span style="font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Week 2</span>
                                    </div>
                                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                        <div style="width: 100%; height: 120px; background: var(--blue); border: var(--border);"></div>
                                        <span style="font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Week 3</span>
                                    </div>
                                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                        <div style="width: 100%; height: 150px; background: var(--green); border: var(--border);"></div>
                                        <span style="font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Week 4</span>
                                    </div>
                                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                        <div style="width: 100%; height: 180px; background: var(--green); border: var(--border);"></div>
                                        <span style="font-size: 0.75rem; margin-top: 4px; font-weight: 600;">Week 5</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h4 style="font-weight: 800; margin-bottom: 16px;">🎯 Subject Performance</h4>
                                <div style="margin-bottom: 14px;">
                                    <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                        <span>Mathematics</span>
                                        <span>85%</span>
                                    </div>
                                    <div style="width: 100%; height: 10px; background: #eee; border: var(--border); margin-top: 4px;">
                                        <div style="width: 85%; height: 100%; background: var(--green);"></div>
                                    </div>
                                </div>
                                <div style="margin-bottom: 14px;">
                                    <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                        <span>Physics</span>
                                        <span>72%</span>
                                    </div>
                                    <div style="width: 100%; height: 10px; background: #eee; border: var(--border); margin-top: 4px;">
                                        <div style="width: 72%; height: 100%; background: var(--blue);"></div>
                                    </div>
                                </div>
                                <div style="margin-bottom: 14px;">
                                    <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                        <span>Chemistry</span>
                                        <span>60%</span>
                                    </div>
                                    <div style="width: 100%; height: 10px; background: #eee; border: var(--border); margin-top: 4px;">
                                        <div style="width: 60%; height: 100%; background: var(--brown);"></div>
                                    </div>
                                </div>
                                <div>
                                    <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                        <span>English</span>
                                        <span>90%</span>
                                    </div>
                                    <div style="width: 100%; height: 10px; background: #eee; border: var(--border); margin-top: 4px;">
                                        <div style="width: 90%; height: 100%; background: var(--pink);"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-4">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center;">
                                <span style="font-size: 2.5rem; display: block;">📚</span>
                                <h5 style="font-weight: 800;">Topics Mastered</h5>
                                <span style="font-size: 2rem; font-weight: 800; color: var(--green);">18</span>
                                <p style="color: #666; font-size: 0.85rem;">Out of 24 total</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center;">
                                <span style="font-size: 2.5rem; display: block;">⏱️</span>
                                <h5 style="font-weight: 800;">Study Time</h5>
                                <span style="font-size: 2rem; font-weight: 800; color: var(--blue);">48h</span>
                                <p style="color: #666; font-size: 0.85rem;">This month</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center;">
                                <span style="font-size: 2.5rem; display: block;">🏆</span>
                                <h5 style="font-weight: 800;">Achievements</h5>
                                <span style="font-size: 2rem; font-weight: 800; color: var(--brown);">12</span>
                                <p style="color: #666; font-size: 0.85rem;">Badges earned</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection