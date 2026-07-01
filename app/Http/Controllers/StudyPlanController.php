<?php

namespace App\Http\Controllers;

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
            'subjects' => 'required|array',
            'preferred_start_time' => 'required',
            'preferred_end_time' => 'required',
            'study_duration' => 'required|integer',
            'break_duration' => 'required|integer',
            'study_days' => 'required|array',
            'weekly_goal_hours' => 'required|integer',
            'description' => 'nullable|text',
            'title' => 'required|varchar|max:255',
            'difficulty_level'=> 'default|varchar|max:50',
        ]);
        
        // Store study plan (replace with actual logic)
        // StudyPlan::create([...]);
        
        return redirect()->route('dashboard.study-plan')
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