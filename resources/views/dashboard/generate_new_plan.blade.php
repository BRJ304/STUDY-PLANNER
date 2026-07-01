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
                            <h2 class="fw-800 mb-0">📝 Generate New Study Plan</h2>
                            <p style="color: #666; margin-top: 4px;">Create a personalized AI-powered study schedule</p>
                        </div>
                        <a href="" class="btn btn-brutal btn-brutal-outline" style="font-size: 0.85rem; padding: 8px 20px;">
                            <i class="bi bi-arrow-left"></i> Back to Plans
                        </a>
                    </div>

                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="alert alert-success mb-4" style="border: var(--border); border-radius: 0; font-weight: 600;">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger mb-4" style="border: var(--border); border-radius: 0; font-weight: 600;">
                            {{ session('error') }}
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

                    <form method="POST" action="{{ route('study-plan.store') }}" id="generatePlanForm">
                        @csrf

                        <!-- Step 1: Basic Information -->
                        <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; margin-bottom: 24px;">
                            <h5 style="font-weight: 800; margin-bottom: 16px;">📋 Basic Information</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="title" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Plan Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                           style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                           placeholder="e.g., Final Exam Study Plan" value="{{ old('title') }}" required>
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Description (Optional)</label>
                                    <textarea class="form-control" id="description" name="description"
                                              style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                              rows="2" placeholder="Brief description of your study plan">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Subjects & Goals -->
                        <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; margin-bottom: 24px;">
                            <h5 style="font-weight: 800; margin-bottom: 16px;">📚 Subjects & Goals</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="exam_date" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Exam Date</label>
                                    <input type="date" class="form-control" id="exam_date" name="exam_date"
                                           style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                           value="{{ old('exam_date') }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="weekly_goal_hours" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Weekly Study Goal</label>
                                    <select class="form-control" id="weekly_goal_hours" name="weekly_goal_hours"
                                            style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                                        <option value="">Select hours per week...</option>
                                        <option value="5" {{ old('weekly_goal_hours') == 5 ? 'selected' : '' }}>5 hours/week (Light)</option>
                                        <option value="10" {{ old('weekly_goal_hours') == 10 ? 'selected' : '' }}>10 hours/week (Moderate)</option>
                                        <option value="15" {{ old('weekly_goal_hours') == 15 ? 'selected' : '' }}>15 hours/week (Intense)</option>
                                        <option value="20" {{ old('weekly_goal_hours') == 20 ? 'selected' : '' }}>20 hours/week (Very Intense)</option>
                                        <option value="25" {{ old('weekly_goal_hours') == 25 ? 'selected' : '' }}>25+ hours/week (Maximum)</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Select Subjects</label>
                                    <div class="row g-2">
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input subject-check" type="checkbox" id="subject_mathematics" name="subjects[]" value="mathematics"
                                                       style="border: var(--border); border-radius: 0;"
                                                       {{ in_array('mathematics', old('subjects', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="subject_mathematics" style="font-weight: 600;">
                                                    📐 Mathematics
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input subject-check" type="checkbox" id="subject_physics" name="subjects[]" value="physics"
                                                       style="border: var(--border); border-radius: 0;"
                                                       {{ in_array('physics', old('subjects', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="subject_physics" style="font-weight: 600;">
                                                    ⚛️ Physics
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input subject-check" type="checkbox" id="subject_chemistry" name="subjects[]" value="chemistry"
                                                       style="border: var(--border); border-radius: 0;"
                                                       {{ in_array('chemistry', old('subjects', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="subject_chemistry" style="font-weight: 600;">
                                                    🧪 Chemistry
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input subject-check" type="checkbox" id="subject_biology" name="subjects[]" value="biology"
                                                       style="border: var(--border); border-radius: 0;"
                                                       {{ in_array('biology', old('subjects', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="subject_biology" style="font-weight: 600;">
                                                    🧬 Biology
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input subject-check" type="checkbox" id="subject_english" name="subjects[]" value="english"
                                                       style="border: var(--border); border-radius: 0;"
                                                       {{ in_array('english', old('subjects', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="subject_english" style="font-weight: 600;">
                                                    📖 English
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input subject-check" type="checkbox" id="subject_history" name="subjects[]" value="history"
                                                       style="border: var(--border); border-radius: 0;"
                                                       {{ in_array('history', old('subjects', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="subject_history" style="font-weight: 600;">
                                                    📜 History
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input subject-check" type="checkbox" id="subject_computer_science" name="subjects[]" value="computer_science"
                                                       style="border: var(--border); border-radius: 0;"
                                                       {{ in_array('computer_science', old('subjects', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="subject_computer_science" style="font-weight: 600;">
                                                    💻 Computer Science
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-6">
                                            <div class="form-check">
                                                <input class="form-check-input subject-check" type="checkbox" id="subject_other" name="subjects[]" value="other"
                                                       style="border: var(--border); border-radius: 0;"
                                                       {{ in_array('other', old('subjects', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="subject_other" style="font-weight: 600;">
                                                    📝 Other
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" id="other_subject_container" style="display: none;">
                                    <label for="other_subject" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Specify Other Subject</label>
                                    <input type="text" class="form-control" id="other_subject" name="other_subject"
                                           style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                           placeholder="Enter subject name" value="{{ old('other_subject') }}">
                                </div>
                            </div>
                        </div>

                        <!-- Step 3: Schedule Preferences -->
                        <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; margin-bottom: 24px;">
                            <h5 style="font-weight: 800; margin-bottom: 16px;">⏰ Schedule Preferences</h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="preferred_start_time" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Preferred Start Time</label>
                                    <input type="time" class="form-control" id="preferred_start_time" name="preferred_start_time"
                                           style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                           value="{{ old('preferred_start_time', '09:00') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="preferred_end_time" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Preferred End Time</label>
                                    <input type="time" class="form-control" id="preferred_end_time" name="preferred_end_time"
                                           style="border: var(--border); border-radius: 0; padding: 12px 16px;"
                                           value="{{ old('preferred_end_time', '18:00') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="timezone" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Timezone</label>
                                    <select class="form-control" id="timezone" name="timezone"
                                            style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                        <option value="UTC">UTC</option>
                                        <option value="America/New_York">Eastern Time (ET)</option>
                                        <option value="America/Chicago">Central Time (CT)</option>
                                        <option value="America/Denver">Mountain Time (MT)</option>
                                        <option value="America/Los_Angeles">Pacific Time (PT)</option>
                                        <option value="Europe/London">GMT (London)</option>
                                        <option value="Europe/Paris">CET (Paris)</option>
                                        <option value="Asia/Dubai">GST (Dubai)</option>
                                        <option value="Asia/Kolkata" selected>IST (India)</option>
                                        <option value="Asia/Tokyo">JST (Tokyo)</option>
                                        <option value="Australia/Sydney">AEDT (Sydney)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Step 4: Study Duration Settings -->
                        <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; margin-bottom: 24px;">
                            <h5 style="font-weight: 800; margin-bottom: 16px;">⏱️ Study Duration Settings</h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="study_duration" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Study Session Duration</label>
                                    <select class="form-control" id="study_duration" name="study_duration"
                                            style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                                        <option value="25" {{ old('study_duration') == 25 ? 'selected' : '' }}>25 minutes (Pomodoro)</option>
                                        <option value="30" {{ old('study_duration') == 30 ? 'selected' : '' }}>30 minutes</option>
                                        <option value="45" {{ old('study_duration') == 45 ? 'selected' : '' }}>45 minutes</option>
                                        <option value="60" {{ old('study_duration') == 60 ? 'selected' : '' }} selected>60 minutes</option>
                                        <option value="90" {{ old('study_duration') == 90 ? 'selected' : '' }}>90 minutes</option>
                                        <option value="120" {{ old('study_duration') == 120 ? 'selected' : '' }}>120 minutes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="break_duration" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Break Duration</label>
                                    <select class="form-control" id="break_duration" name="break_duration"
                                            style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                                        <option value="5" {{ old('break_duration') == 5 ? 'selected' : '' }}>5 minutes</option>
                                        <option value="10" {{ old('break_duration') == 10 ? 'selected' : '' }} selected>10 minutes</option>
                                        <option value="15" {{ old('break_duration') == 15 ? 'selected' : '' }}>15 minutes</option>
                                        <option value="20" {{ old('break_duration') == 20 ? 'selected' : '' }}>20 minutes</option>
                                        <option value="30" {{ old('break_duration') == 30 ? 'selected' : '' }}>30 minutes</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="difficulty_level" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Difficulty Level</label>
                                    <select class="form-control" id="difficulty_level" name="difficulty_level"
                                            style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                        <option value="easy" {{ old('difficulty_level') == 'easy' ? 'selected' : '' }}>Easy - Light workload</option>
                                        <option value="medium" {{ old('difficulty_level') == 'medium' ? 'selected' : '' }} selected>Medium - Balanced</option>
                                        <option value="hard" {{ old('difficulty_level') == 'hard' ? 'selected' : '' }}>Hard - Intensive workload</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Step 5: Study Days -->
                        <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; margin-bottom: 24px;">
                            <h5 style="font-weight: 800; margin-bottom: 16px;">📅 Select Study Days</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="d-flex flex-wrap gap-3">
                                        <div class="form-check">
                                            <input class="form-check-input day-check" type="checkbox" id="day_monday" name="study_days[]" value="monday"
                                                   style="border: var(--border); border-radius: 0;"
                                                   {{ in_array('monday', old('study_days', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="day_monday" style="font-weight: 600;">Monday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input day-check" type="checkbox" id="day_tuesday" name="study_days[]" value="tuesday"
                                                   style="border: var(--border); border-radius: 0;"
                                                   {{ in_array('tuesday', old('study_days', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="day_tuesday" style="font-weight: 600;">Tuesday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input day-check" type="checkbox" id="day_wednesday" name="study_days[]" value="wednesday"
                                                   style="border: var(--border); border-radius: 0;"
                                                   {{ in_array('wednesday', old('study_days', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="day_wednesday" style="font-weight: 600;">Wednesday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input day-check" type="checkbox" id="day_thursday" name="study_days[]" value="thursday"
                                                   style="border: var(--border); border-radius: 0;"
                                                   {{ in_array('thursday', old('study_days', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="day_thursday" style="font-weight: 600;">Thursday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input day-check" type="checkbox" id="day_friday" name="study_days[]" value="friday"
                                                   style="border: var(--border); border-radius: 0;"
                                                   {{ in_array('friday', old('study_days', ['monday', 'tuesday', 'wednesday', 'thursday', 'friday'])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="day_friday" style="font-weight: 600;">Friday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input day-check" type="checkbox" id="day_saturday" name="study_days[]" value="saturday"
                                                   style="border: var(--border); border-radius: 0;"
                                                   {{ in_array('saturday', old('study_days', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="day_saturday" style="font-weight: 600;">Saturday</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input day-check" type="checkbox" id="day_sunday" name="study_days[]" value="sunday"
                                                   style="border: var(--border); border-radius: 0;"
                                                   {{ in_array('sunday', old('study_days', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="day_sunday" style="font-weight: 600;">Sunday</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 6: Study Preferences -->
                        <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; margin-bottom: 24px;">
                            <h5 style="font-weight: 800; margin-bottom: 16px;">🎯 Study Preferences</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="study_style" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Learning Style</label>
                                    <select class="form-control" id="study_style" name="study_style"
                                            style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                        <option value="visual" {{ old('study_style') == 'visual' ? 'selected' : '' }}>Visual - Learn by seeing</option>
                                        <option value="auditory" {{ old('study_style') == 'auditory' ? 'selected' : '' }}>Auditory - Learn by listening</option>
                                        <option value="reading" {{ old('study_style') == 'reading' ? 'selected' : '' }}>Reading/Writing</option>
                                        <option value="kinesthetic" {{ old('study_style') == 'kinesthetic' ? 'selected' : '' }}>Kinesthetic - Learn by doing</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="study_preference" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Study Preference</label>
                                    <select class="form-control" id="study_preference" name="study_preference"
                                            style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                        <option value="morning" {{ old('study_preference') == 'morning' ? 'selected' : '' }}>Morning Person</option>
                                        <option value="afternoon" {{ old('study_preference') == 'afternoon' ? 'selected' : '' }} selected>Afternoon</option>
                                        <option value="evening" {{ old('study_preference') == 'evening' ? 'selected' : '' }}>Evening Person</option>
                                        <option value="night" {{ old('study_preference') == 'night' ? 'selected' : '' }}>Night Owl</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Step 7: AI Generation Options -->
                        <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px; margin-bottom: 24px;">
                            <h5 style="font-weight: 800; margin-bottom: 16px;">🤖 AI Generation Options</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="ai_optimize" name="ai_optimize"
                                               style="border: var(--border); border-radius: 0;" checked>
                                        <label class="form-check-label" for="ai_optimize" style="font-weight: 600;">
                                            🔄 AI Optimize Schedule
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Let AI intelligently distribute study sessions based on subject difficulty and your preferences</p>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" id="ai_adaptive" name="ai_adaptive"
                                               style="border: var(--border); border-radius: 0;" checked>
                                        <label class="form-check-label" for="ai_adaptive" style="font-weight: 600;">
                                            🧠 Adaptive Learning
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">AI will adapt the plan based on your progress and performance</p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="ai_reminders" name="ai_reminders"
                                               style="border: var(--border); border-radius: 0;" checked>
                                        <label class="form-check-label" for="ai_reminders" style="font-weight: 600;">
                                            🔔 Smart Reminders
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Get AI-powered reminders and motivational messages</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                            <button type="submit" class="btn btn-brutal btn-brutal-primary" style="flex: 1;">
                                <i class="bi bi-magic"></i> Generate AI Study Plan
                            </button>
                            <button type="reset" class="btn btn-brutal btn-brutal-outline" style="flex: 0.5;">
                                <i class="bi bi-arrow-counterclockwise"></i> Reset
                            </button>
                            <a href="" class="btn btn-brutal btn-brutal-secondary" style="flex: 0.5;">
                                <i class="bi bi-x-circle"></i> Cancel
                            </a>
                        </div>

                        <!-- Progress Indicator -->
                        <div style="margin-top: 16px; text-align: center;">
                            <div style="display: flex; justify-content: center; gap: 8px; margin-bottom: 8px;">
                                <span style="width: 30px; height: 4px; background: var(--brown);"></span>
                                <span style="width: 30px; height: 4px; background: var(--brown);"></span>
                                <span style="width: 30px; height: 4px; background: var(--brown);"></span>
                                <span style="width: 30px; height: 4px; background: var(--brown);"></span>
                                <span style="width: 30px; height: 4px; background: var(--brown);"></span>
                                <span style="width: 30px; height: 4px; background: var(--brown);"></span>
                                <span style="width: 30px; height: 4px; background: #ddd;"></span>
                            </div>
                            <p style="font-size: 0.8rem; color: #888; margin: 0;">
                                Step <span id="currentStep">1</span> of 7 - Basic Information
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        box-shadow: none;
        border-color: var(--black);
        background: white;
    }
    .form-check-input:checked {
        background-color: var(--black);
        border-color: var(--black);
    }
    .form-check-input {
        margin-top: 0.3rem;
    }
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
    .subject-check:checked + label {
        color: var(--brown);
    }
</style>

<script>
    // Show/hide other subject input
    document.addEventListener('DOMContentLoaded', function() {
        const otherCheckbox = document.getElementById('subject_other');
        const otherContainer = document.getElementById('other_subject_container');
        
        if (otherCheckbox) {
            otherCheckbox.addEventListener('change', function() {
                otherContainer.style.display = this.checked ? 'block' : 'none';
            });
            
            // Check initial state
            if (otherCheckbox.checked) {
                otherContainer.style.display = 'block';
            }
        }

        // Update step indicator
        const form = document.getElementById('generatePlanForm');
        const sections = form.querySelectorAll('[style*="background: white; border: var(--border);"]');
        const stepIndicator = document.getElementById('currentStep');
        let currentStep = 1;

        // Add step numbers to sections
        sections.forEach((section, index) => {
            const stepNum = index + 1;
            const heading = section.querySelector('h5');
            if (heading) {
                heading.innerHTML = heading.innerHTML.replace(/^\d+\.\s*/, '');
                heading.innerHTML = `<span style="background: var(--brown); color: white; padding: 2px 10px; margin-right: 8px; border: var(--border);">${stepNum}</span> ${heading.innerHTML}`;
            }
        });

        // Update step on scroll
        window.addEventListener('scroll', function() {
            let maxVisible = 0;
            sections.forEach((section, index) => {
                const rect = section.getBoundingClientRect();
                if (rect.top < window.innerHeight / 2) {
                    maxVisible = index + 1;
                }
            });
            if (maxVisible > 0 && maxVisible <= sections.length) {
                currentStep = maxVisible;
                stepIndicator.textContent = currentStep;
            }
        });
    });
</script>
@endsection