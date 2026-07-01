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
                    <!-- Page Header -->
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px; margin-bottom: 24px;">
                        <div>
                            <h2 class="fw-800 mb-0">📊 Progress Analytics</h2>
                            <p style="color: #666; margin-top: 4px;">Track your study performance and metrics</p>
                        </div>
                        <button class="btn btn-brutal btn-brutal-primary" data-bs-toggle="modal" data-bs-target="#logProgressModal" style="font-size: 0.85rem; padding: 8px 20px;">
                            📝 Log Daily Progress
                        </button>
                    </div>

                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="alert alert-success mb-4" style="border: var(--border); border-radius: 0; font-weight: 600;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger mb-4" style="border: var(--border); border-radius: 0; font-weight: 600;">
                            <ul class="mb-0" style="list-style: none; padding-left: 0;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h4 style="font-weight: 800; margin-bottom: 16px;">📈 Performance Overview</h4>
                                <div style="height: 200px; display: flex; align-items: flex-end; gap: 12px; padding: 12px 0;">
                                    @foreach($weeklyProgress as $p)
                                    <div style="flex: 1; display: flex; flex-direction: column; align-items: center;">
                                        @php
                                            $height = min(150, max(15, round($p['hours'] * 8)));
                                        @endphp
                                        <div style="width: 100%; height: {{ $height }}px; background: {{ $loop->last ? 'var(--green)' : 'var(--blue)' }}; border: var(--border); text-align: center; color: var(--black); font-size: 0.75rem; font-weight: 800; display: flex; align-items: center; justify-content: center;">
                                            {{ $p['hours'] }}h
                                        </div>
                                        <span style="font-size: 0.75rem; margin-top: 4px; font-weight: 600;">{{ $p['week'] }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h4 style="font-weight: 800; margin-bottom: 16px;">🎯 Subject Performance</h4>
                                @foreach($subjectPerformance as $item)
                                <div style="margin-bottom: 14px;">
                                    <div style="display: flex; justify-content: space-between; font-weight: 600; font-size: 0.9rem;">
                                        <span>{{ $item['subject'] }}</span>
                                        <span>{{ $item['progress'] }}%</span>
                                    </div>
                                    <div style="width: 100%; height: 10px; background: #eee; border: var(--border); margin-top: 4px;">
                                        <div style="width: {{ $item['progress'] }}%; height: 100%; background: {{ $loop->iteration % 4 == 0 ? 'var(--pink)' : ($loop->iteration % 3 == 0 ? 'var(--brown)' : ($loop->iteration % 2 == 0 ? 'var(--blue)' : 'var(--green)')) }};"></div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-4">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center;">
                                <span style="font-size: 2.5rem; display: block;">📚</span>
                                <h5 style="font-weight: 800;">Topics Mastered</h5>
                                <span style="font-size: 2rem; font-weight: 800; color: var(--green);">{{ $stats['topics_mastered'] }}</span>
                                <p style="color: #666; font-size: 0.85rem;">Out of {{ $stats['total_topics'] }} total</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center;">
                                <span style="font-size: 2.5rem; display: block;">⏱️</span>
                                <h5 style="font-weight: 800;">Study Time</h5>
                                <span style="font-size: 2rem; font-weight: 800; color: var(--blue);">{{ $stats['study_time'] }}h</span>
                                <p style="color: #666; font-size: 0.85rem;">Logged hours</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; text-align: center;">
                                <span style="font-size: 2.5rem; display: block;">🏆</span>
                                <h5 style="font-weight: 800;">Achievements</h5>
                                <span style="font-size: 2rem; font-weight: 800; color: var(--brown);">{{ $stats['achievements'] }}</span>
                                <p style="color: #666; font-size: 0.85rem;">Badges earned</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ========== LOG PROGRESS MODAL ========== -->
<div class="modal fade" id="logProgressModal" tabindex="-1" aria-labelledby="logProgressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border: var(--border); border-radius: 0; background: #f5f0e8;">
            <div class="modal-header" style="border-bottom: var(--border); padding: 20px 24px;">
                <h5 class="modal-title fw-800" id="logProgressModalLabel" style="font-size: 1.2rem;">
                    📝 Log Daily Progress
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('progress.store') }}" method="POST">
                @csrf
                <div class="modal-body" style="padding: 24px;">
                    <div class="mb-3">
                        <label for="hours_studied" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Hours Studied</label>
                        <input type="number" step="0.1" class="form-control" id="hours_studied" name="hours_studied"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px;" required min="0" max="24" value="2.0">
                    </div>
                    
                    <div class="mb-3">
                        <label for="focus_level" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Focus Level (1-10)</label>
                        <select class="form-control" id="focus_level" name="focus_level"
                                style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                            @for($i=10; $i>=1; $i--)
                                <option value="{{ $i }}" {{ $i == 8 ? 'selected' : '' }}>{{ $i }} - {{ $i >= 8 ? 'Excellent' : ($i >= 6 ? 'Good' : ($i >= 4 ? 'Average' : 'Poor')) }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="daily_mood" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Daily Mood</label>
                        <select class="form-control" id="daily_mood" name="daily_mood"
                                style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                            <option value="excellent">😄 Excellent</option>
                            <option value="good" selected>🙂 Good</option>
                            <option value="okay">😐 Okay</option>
                            <option value="bad">😞 Bad</option>
                            <option value="terrible">😭 Terrible</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="topics_mastered" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Topics Mastered Today</label>
                        <input type="number" class="form-control" id="topics_mastered" name="topics_mastered"
                               style="border: var(--border); border-radius: 0; padding: 12px 16px;" value="1" min="0">
                    </div>

                    <div class="mb-3">
                        <label for="daily_notes" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Daily Notes</label>
                        <textarea class="form-control" id="daily_notes" name="daily_notes" rows="3"
                                  style="border: var(--border); border-radius: 0; padding: 12px 16px;" placeholder="What did you learn? Any challenges?"></textarea>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: var(--border); padding: 16px 24px;">
                    <button type="button" class="btn btn-brutal btn-brutal-outline" data-bs-dismiss="modal" style="font-size: 0.85rem; padding: 8px 20px;">Cancel</button>
                    <button type="submit" class="btn btn-brutal btn-brutal-primary" style="font-size: 0.85rem; padding: 8px 20px;">Log Progress</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection