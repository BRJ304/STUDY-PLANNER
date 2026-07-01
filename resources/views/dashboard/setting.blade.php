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
                    <h2 class="fw-800 mb-4">⚙️ Settings</h2>

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

                    <div class="row g-4">
                        <!-- Change Password -->
                        <div class="col-lg-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h5 style="font-weight: 800; margin-bottom: 16px;">🔐 Change Password</h5>
                                <form method="POST" action="{{ route('settings.password') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Current Password</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password"
                                               style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">New Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                                        <small style="color: #888; font-size: 0.7rem;">Password must be at least 8 characters</small>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Confirm New Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                               style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                                    </div>
                                    <button type="submit" class="btn btn-brutal btn-brutal-primary">Update Password</button>
                                </form>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <div class="col-lg-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h5 style="font-weight: 800; margin-bottom: 16px;">🔔 Notification Preferences</h5>
                                <form method="POST" action="{{ route('settings.notifications') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="email_notifications" name="email_notifications"
                                               style="border: var(--border); border-radius: 0;"
                                               {{ Auth::user()->email_notifications ?? 'checked' }}>
                                        <label class="form-check-label" for="email_notifications" style="font-weight: 600;">
                                            Email Notifications
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Receive updates and reminders via email</p>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="push_notifications" name="push_notifications"
                                               style="border: var(--border); border-radius: 0;"
                                               {{ Auth::user()->push_notifications ?? 'checked' }}>
                                        <label class="form-check-label" for="push_notifications" style="font-weight: 600;">
                                            Push Notifications
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Get real-time notifications in your browser</p>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="study_reminders" name="study_reminders"
                                               style="border: var(--border); border-radius: 0;"
                                               {{ Auth::user()->study_reminders ?? 'checked' }}>
                                        <label class="form-check-label" for="study_reminders" style="font-weight: 600;">
                                            Study Reminders
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Get reminded about your study sessions</p>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="progress_reports" name="progress_reports"
                                               style="border: var(--border); border-radius: 0;"
                                               {{ Auth::user()->progress_reports ?? 'checked' }}>
                                        <label class="form-check-label" for="progress_reports" style="font-weight: 600;">
                                            Weekly Progress Reports
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Receive weekly summaries of your study progress</p>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="exam_alerts" name="exam_alerts"
                                               style="border: var(--border); border-radius: 0;"
                                               {{ Auth::user()->exam_alerts ?? 'checked' }}>
                                        <label class="form-check-label" for="exam_alerts" style="font-weight: 600;">
                                            Exam Alerts
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Get alerts about upcoming exams and deadlines</p>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="marketing_emails" name="marketing_emails"
                                               style="border: var(--border); border-radius: 0;">
                                        <label class="form-check-label" for="marketing_emails" style="font-weight: 600;">
                                            Marketing Emails
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Receive tips, updates, and special offers</p>
                                    </div>

                                    <button type="submit" class="btn btn-brutal btn-brutal-secondary w-100">Save Notification Preferences</button>
                                </form>
                            </div>
                        </div>

                        <!-- Privacy Settings -->
                        <div class="col-lg-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h5 style="font-weight: 800; margin-bottom: 16px;">🔒 Privacy Settings</h5>
                                <form method="POST" action="{{ route('settings.privacy') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="profile_visibility" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Profile Visibility</label>
                                        <select class="form-control" id="profile_visibility" name="profile_visibility"
                                                style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                            <option value="public">Public - Anyone can see your profile</option>
                                            <option value="private" selected>Private - Only you can see your profile</option>
                                            <option value="friends">Friends Only - Only friends can see your profile</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="study_data_sharing" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Study Data Sharing</label>
                                        <select class="form-control" id="study_data_sharing" name="study_data_sharing"
                                                style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                            <option value="none" selected>Don't share my study data</option>
                                            <option value="friends">Share with friends only</option>
                                            <option value="all">Share with everyone</option>
                                        </select>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="show_progress" name="show_progress"
                                               style="border: var(--border); border-radius: 0;">
                                        <label class="form-check-label" for="show_progress" style="font-weight: 600;">
                                            Show Progress to Others
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Allow others to see your study progress</p>
                                    </div>

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="show_online_status" name="show_online_status"
                                               style="border: var(--border); border-radius: 0;" checked>
                                        <label class="form-check-label" for="show_online_status" style="font-weight: 600;">
                                            Show Online Status
                                        </label>
                                        <p style="font-size: 0.8rem; color: #888; margin-left: 28px;">Let others see when you're online</p>
                                    </div>

                                    <button type="submit" class="btn btn-brutal btn-brutal-primary w-100">Save Privacy Settings</button>
                                </form>
                            </div>
                        </div>

                        <!-- Preferences -->
                        <div class="col-lg-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h5 style="font-weight: 800; margin-bottom: 16px;">🌐 Preferences</h5>
                                <form method="POST" action="{{ route('settings.preferences') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="language" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Language</label>
                                        <select class="form-control" id="language" name="language"
                                                style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                            <option value="en" selected>English</option>
                                            <option value="es">Spanish</option>
                                            <option value="fr">French</option>
                                            <option value="de">German</option>
                                            <option value="zh">Chinese</option>
                                            <option value="ja">Japanese</option>
                                            <option value="ko">Korean</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="theme" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Theme</label>
                                        <select class="form-control" id="theme" name="theme"
                                                style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                            <option value="light" selected>Light</option>
                                            <option value="dark">Dark</option>
                                            <option value="system">System Default</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="font_size" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Font Size</label>
                                        <select class="form-control" id="font_size" name="font_size"
                                                style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                            <option value="small">Small</option>
                                            <option value="medium" selected>Medium</option>
                                            <option value="large">Large</option>
                                            <option value="xlarge">Extra Large</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
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
                                            <option value="Asia/Kolkata">IST (India)</option>
                                            <option value="Asia/Tokyo">JST (Tokyo)</option>
                                            <option value="Australia/Sydney">AEDT (Sydney)</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-brutal btn-brutal-secondary w-100">Save Preferences</button>
                                </form>
                            </div>
                        </div>

                        <!-- Study Preferences -->
                        <div class="col-lg-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h5 style="font-weight: 800; margin-bottom: 16px;">📚 Study Preferences</h5>
                                <form method="POST" action="{{ route('settings.study') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="study_preference" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Preferred Study Time</label>
                                        <select class="form-control" id="study_preference" name="study_preference"
                                                style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                            <option value="morning">Morning (6 AM - 12 PM)</option>
                                            <option value="afternoon" selected>Afternoon (12 PM - 6 PM)</option>
                                            <option value="evening">Evening (6 PM - 12 AM)</option>
                                            <option value="night">Night (12 AM - 6 AM)</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="learning_style" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Learning Style</label>
                                        <select class="form-control" id="learning_style" name="learning_style"
                                                style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                            <option value="visual">Visual - Learn by seeing</option>
                                            <option value="auditory">Auditory - Learn by listening</option>
                                            <option value="reading">Reading/Writing - Learn by reading and writing</option>
                                            <option value="kinesthetic">Kinesthetic - Learn by doing</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="goal" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Study Goal</label>
                                        <select class="form-control" id="goal" name="goal"
                                                style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                            <option value="pass">Pass Exams</option>
                                            <option value="excellent" selected>Get Excellent Grades</option>
                                            <option value="master">Master Subject</option>
                                            <option value="prepare">Prepare for Future</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="weekly_goal_hours" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Weekly Study Goal</label>
                                        <select class="form-control" id="weekly_goal_hours" name="weekly_goal_hours"
                                                style="border: var(--border); border-radius: 0; padding: 12px 16px;">
                                            <option value="5">5 hours/week</option>
                                            <option value="10" selected>10 hours/week</option>
                                            <option value="15">15 hours/week</option>
                                            <option value="20">20 hours/week</option>
                                            <option value="25">25+ hours/week</option>
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-brutal btn-brutal-primary w-100">Save Study Preferences</button>
                                </form>
                            </div>
                        </div>

                        <!-- Account Management -->
                        <div class="col-lg-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h5 style="font-weight: 800; margin-bottom: 16px;">⚠️ Account Management</h5>
                                <div style="background: #fff5f5; border: 2px solid #dc3545; padding: 16px; margin-bottom: 16px;">
                                    <p style="color: #dc3545; font-weight: 700; margin: 0;">Danger Zone</p>
                                    <p style="color: #666; font-size: 0.85rem; margin: 4px 0 0 0;">
                                        Once you delete your account, there is no going back. Please be certain.
                                    </p>
                                </div>

                                <form method="POST" action="{{ route('settings.account.delete') }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" id="confirm_delete" name="confirm_delete" required
                                               style="border: var(--border); border-radius: 0;">
                                        <label class="form-check-label" for="confirm_delete" style="font-weight: 600;">
                                            I understand that this action is permanent and cannot be undone
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <label for="delete_password" class="form-label" style="font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Enter Password to Confirm</label>
                                        <input type="password" class="form-control" id="delete_password" name="password"
                                               style="border: var(--border); border-radius: 0; padding: 12px 16px;" required>
                                    </div>

                                    <button type="submit" class="btn btn-brutal" style="background: #dc3545; color: white; border: var(--border); width: 100%;">
                                        Delete Account
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Session Management -->
                        <div class="col-lg-6">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h5 style="font-weight: 800; margin-bottom: 16px;">🔑 Sessions</h5>
                                <div style="margin-bottom: 16px;">
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #eee;">
                                        <div>
                                            <span style="font-weight: 700;">Current Session</span>
                                            <p style="font-size: 0.8rem; color: #888; margin: 0;">Chrome on Windows - {{ now()->format('M d, Y H:i') }}</p>
                                        </div>
                                        <span style="background: var(--green); padding: 2px 12px; border: var(--border); font-size: 0.7rem; font-weight: 700;">Active</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0; border-bottom: 1px solid #eee;">
                                        <div>
                                            <span style="font-weight: 700;">Firefox on Mac</span>
                                            <p style="font-size: 0.8rem; color: #888; margin: 0;">Jan 20, 2026 14:30</p>
                                        </div>
                                        <span style="background: #eee; padding: 2px 12px; border: var(--border); font-size: 0.7rem; font-weight: 700;">Expired</span>
                                    </div>
                                    <div style="display: flex; justify-content: space-between; align-items: center; padding: 8px 0;">
                                        <div>
                                            <span style="font-weight: 700;">Safari on iPhone</span>
                                            <p style="font-size: 0.8rem; color: #888; margin: 0;">Jan 19, 2026 09:15</p>
                                        </div>
                                        <span style="background: #eee; padding: 2px 12px; border: var(--border); font-size: 0.7rem; font-weight: 700;">Expired</span>
                                    </div>
                                </div>
                                <form method="get" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-brutal btn-brutal-outline w-100">
                                        Logout from All Devices
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Export Data -->
                        <div class="col-lg-12">
                            <div style="background: white; border: var(--border); box-shadow: var(--shadow); padding: 24px;">
                                <h5 style="font-weight: 800; margin-bottom: 16px;">📥 Export Data</h5>
                                {{-- <div class="row g-3">
                                    <div class="col-md-4">
                                        <a href="{{ route('settings.export.study') }}" class="btn btn-brutal btn-brutal-outline w-100">
                                            <i class="bi bi-book"></i> Export Study Data
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('settings.export.progress') }}" class="btn btn-brutal btn-brutal-outline w-100">
                                            <i class="bi bi-graph-up"></i> Export Progress
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('settings.export.all') }}" class="btn btn-brutal btn-brutal-primary w-100">
                                            <i class="bi bi-download"></i> Export All Data
                                        </a>
                                    </div>
                                </div> --}}
                                <p style="color: #888; font-size: 0.8rem; margin-top: 12px; text-align: center;">
                                    Your data will be exported in JSON format. This includes all your study sessions, progress, and materials.
                                </p>
                            </div>
                        </div>
                    </div>
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
    .btn-brutal:disabled {
        opacity: 0.5;
        cursor: not-allowed;
        transform: none !important;
    }
</style>
@endsection