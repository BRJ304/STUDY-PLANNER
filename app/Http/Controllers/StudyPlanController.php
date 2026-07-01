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

        // Deactivate (pause) any existing active study plans for the user
        StudyPlan::where('user_id', Auth::id())
            ->where('status', 'active')
            ->update(['status' => 'paused']);

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
        $plan = StudyPlan::where('user_id', Auth::id())->findOrFail($id);
        
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'status' => ['nullable', 'string', 'in:active,paused,completed'],
        ]);
        
        $plan->update($request->only('title', 'description', 'status'));
        
        return back()->with('success', 'Study plan updated successfully!');
    }
    
    /**
     * Delete study plan
     */
    public function destroy($id)
    {
        $plan = StudyPlan::where('user_id', Auth::id())->findOrFail($id);
        $plan->studySessions()->delete();
        $plan->delete();
        
        return back()->with('success', 'Study plan deleted successfully!');
    }
    
    private function getWeeklySchedule()
    {
        $user = Auth::user();
        $activePlan = StudyPlan::where('user_id', $user->id)->where('status', 'active')->first();
        
        if (!$activePlan) {
            return [
                ['day' => 'Monday', 'subjects' => 'No active plan. Create one!', 'hours' => 0, 'status' => 'No Plan'],
            ];
        }
        
        $schedule = [];
        $days = $activePlan->study_days ?? [];
        $subjectsStr = is_array($activePlan->subjects) ? implode(', ', $activePlan->subjects) : (string)$activePlan->subjects;
        $hoursPerDay = round($activePlan->study_duration / 60, 1);
        
        // Fetch progress records for the current week where hours were logged
        $progressDays = \App\Models\Progress::where('user_id', $user->id)
            ->where('date', '>=', now()->startOfWeek()->toDateString())
            ->where('hours_studied', '>', 0)
            ->get()
            ->map(function($p) {
                return strtolower($p->date->format('l'));
            })
            ->toArray();
        
        foreach ($days as $day) {
            $isComplete = in_array(strtolower($day), $progressDays);
            $isToday = strtolower($day) === strtolower(now()->format('l'));
            
            $schedule[] = [
                'day' => ucfirst($day),
                'subjects' => $subjectsStr ?: 'General Study',
                'hours' => $hoursPerDay ?: 1.0,
                'status' => $isComplete ? 'Complete' : ($isToday ? 'In Progress' : 'Active Schedule'),
            ];
        }
        
        return $schedule;
    }
    
    private function getWeeklyStats()
    {
        $user = Auth::user();
        $activePlan = StudyPlan::where('user_id', $user->id)->where('status', 'active')->first();
        
        $targetHours = $activePlan ? $activePlan->weekly_goal_hours : 0;
        
        $completedHours = \App\Models\Progress::where('user_id', $user->id)
            ->where('date', '>=', now()->subDays(7)->toDateString())
            ->sum('hours_studied');
            
        $completedSessions = \App\Models\StudySession::where('user_id', $user->id)
            ->where('status', 'completed')
            ->where('updated_at', '>=', now()->subDays(7))
            ->count();
            
        $totalSessions = \App\Models\StudySession::where('user_id', $user->id)
            ->where('updated_at', '>=', now()->subDays(7))
            ->count();
            
        return [
            'total_hours' => round((float)$completedHours, 1),
            'target_hours' => $targetHours ?: 10,
            'completed_sessions' => $completedSessions ?: 0,
            'total_sessions' => $totalSessions ?: 5,
            'productivity_score' => 90,
        ];
    }
    
    public function generate_new_plan()
    {
        return view('dashboard.generate_new_plan');
    }
}