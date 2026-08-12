<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Show settings page
     */
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.setting', compact('user'));
    }
    
    /**
     * Update password
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }
    
    /**
     * Update notification preferences
     */
    public function updateNotifications(Request $request)
    {
        $user = Auth::user();
        
        $user->email_notifications = $request->has('email_notifications');
        $user->push_notifications = $request->has('push_notifications');
        $user->study_reminders = $request->has('study_reminders');
        $user->progress_reports = $request->has('progress_reports');
        $user->exam_alerts = $request->has('exam_alerts');
        $user->marketing_emails = $request->has('marketing_emails');
        $user->save();

        return back()->with('success', 'Notification preferences updated!');
    }
    
    /**
     * Update privacy settings
     */
    public function updatePrivacy(Request $request)
    {
        $user = Auth::user();
        
        $user->profile_visibility = $request->input('profile_visibility', $user->profile_visibility);
        $user->study_data_sharing = $request->input('study_data_sharing', $user->study_data_sharing);
        $user->show_progress = $request->has('show_progress');
        $user->show_online_status = $request->has('show_online_status');
        $user->save();

        return back()->with('success', 'Privacy settings updated!');
    }
    
    /**
     * Update preferences
     */
    public function updatePreferences(Request $request)
    {
        $user = Auth::user();
        
        $user->language = $request->input('language', $user->language);
        $user->theme = $request->input('theme', $user->theme);
        $user->font_size = $request->input('font_size', $user->font_size);
        $user->timezone = $request->input('timezone', $user->timezone);
        $user->save();

        return back()->with('success', 'Preferences updated!');
    }
    
    /**
     * Update study preferences
     */
    public function updateStudy(Request $request)
    {
        $user = Auth::user();
        
        $user->study_preference = $request->input('study_preference', $user->study_preference);
        $user->learning_style = $request->input('learning_style', $user->learning_style);
        $user->goal = $request->input('goal', $user->goal);
        $user->weekly_goal_hours = $request->input('weekly_goal_hours', $user->weekly_goal_hours);
        $user->save();

        return back()->with('success', 'Study preferences updated!');
    }
    
    /**
     * Delete account
     */
    public function deleteAccount(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Password is incorrect.']);
        }

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Your account has been deleted.');
    }
}