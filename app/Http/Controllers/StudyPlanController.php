<?php

namespace App\Http\Controllers;

use App\Models\StudyPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudyPlanController extends Controller
{
    /**
     * Show study plan page
     */
    public function index()
    {

        $user = Auth::user();
        $weeklySchedule = $this->getWeeklySchedule();
        $stats = $this->getWeeklyStats();
        
        return view('dashboard.study-plan', compact('user', 'weeklySchedule', 'stats'));
    }
    
    /**
     * Create new study plan
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'subjects' => ['required', 'array'],
            'preferred_start_time' => ['required', 'date_format:H:i'],
            'preferred_end_time' => ['required', 'date_format:H:i'],
            'study_duration' => ['nullable', 'integer', 'min:1'],
            'break_duration' => ['nullable', 'integer', 'min:1'],
            'study_days' => ['nullable', 'array'],
            'weekly_goal_hours' => ['required', 'integer', 'min:1'],
            'difficulty_level' => ['nullable', 'string', 'max:50'],
        ]);

        StudyPlan::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'preferred_start_time' => $request->preferred_start_time,
            'preferred_end_time' => $request->preferred_end_time,
            'study_duration' => $request->input('study_duration', 60),
            'break_duration' => $request->input('break_duration', 15),
            'study_days' => $request->input('study_days', ['monday', 'wednesday', 'friday']),
            'weekly_goal_hours' => $request->weekly_goal_hours,
            'subjects' => $request->subjects,
            'difficulty_level' => $request->input('difficulty_level', 'medium'),
            'status' => 'active',
        ]);

        return redirect()->route('study-plan')
            ->with('success', 'Study plan created successfully!');
    }
    
    /**
     * Update study plan
     */
    public function update(Request $request, $id)
    {
        // Update study plan (replace with actual logic)
        return back()->with('success', 'Study plan updated successfully!');
    }
    
    /**
     * Delete study plan
     */
    public function destroy($id)
    {
        // Delete study plan (replace with actual logic)
        return back()->with('success', 'Study plan deleted successfully!');
    }
    
    private function getWeeklySchedule()
    {
        // Get weekly schedule (replace with actual logic)
        return [
            ['day' => 'Monday', 'subjects' => 'Math, Physics', 'hours' => 4.5, 'status' => 'Complete'],
            ['day' => 'Tuesday', 'subjects' => 'Chemistry, English', 'hours' => 3.5, 'status' => 'Complete'],
            ['day' => 'Wednesday', 'subjects' => 'Math, Chemistry', 'hours' => 4.0, 'status' => 'In Progress'],
            ['day' => 'Thursday', 'subjects' => 'Physics, English', 'hours' => 3.0, 'status' => 'Upcoming'],
            ['day' => 'Friday', 'subjects' => 'Review & Practice', 'hours' => 2.5, 'status' => 'Upcoming'],
        ];
    }
    
    private function getWeeklyStats()
    {

        // Get weekly stats (replace with actual logic)
        return [
            'total_hours' => 17.5,
            'target_hours' => 22,
            'completed_sessions' => 8,
            'total_sessions' => 10,
            'productivity_score' => 92,
        ];
    }
    public function generate_new_plan()
    {
        return view('dashboard.generate_new_plan');
    }
}