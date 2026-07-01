<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class DashController extends Controller
{
    /**
     * Show dashboard
     */
    public function Index()
    {
        $user = Auth::user();
        
        // Get statistics
        $stats = [
            'study_hours' => $this->getStudyHours(),
            'topics_mastered' => $this->getTopicsMastered(),
            'exam_readiness' => $this->getExamReadiness(),
            'study_streak' => $this->getStudyStreak(),
        ];
        
        // Get today's schedule
        $schedule = $this->getTodaySchedule();
        
        // Get progress data
        $progress = $this->getProgressData();
        
        return view('dashboard.index', compact('user', 'stats', 'schedule', 'progress'));
    }
    
    private function getStudyHours()
    {
        return round((float)\App\Models\Progress::where('user_id', Auth::id())->sum('hours_studied'), 1);
    }
    
    private function getTopicsMastered()
    {
        return (int)\App\Models\Progress::where('user_id', Auth::id())->sum('topics_mastered');
    }
    
    private function getExamReadiness()
    {
        $lastLog = \App\Models\Progress::where('user_id', Auth::id())->orderBy('date', 'desc')->first();
        return $lastLog ? $lastLog->exam_readiness : 0;
    }
    
    private function getStudyStreak()
    {
        $dates = \App\Models\Progress::where('user_id', Auth::id())
            ->where('hours_studied', '>', 0)
            ->orderBy('date', 'desc')
            ->pluck('date')
            ->map(function($d) { return $d ? $d->toDateString() : ''; })
            ->unique()
            ->toArray();
            
        if (empty($dates)) {
            return 0;
        }
        
        $streak = 0;
        $currentDate = now();
        
        $todayStr = $currentDate->toDateString();
        $yesterdayStr = $currentDate->subDay()->toDateString();
        
        if (!in_array($todayStr, $dates) && !in_array($yesterdayStr, $dates)) {
            return 0;
        }
        
        $checkDate = in_array($todayStr, $dates) ? now() : now()->subDay();
        
        while (in_array($checkDate->toDateString(), $dates)) {
            $streak++;
            $checkDate->subDay();
        }
        
        return $streak;
    }
    
    private function getTodaySchedule()
    {
        $sessions = \App\Models\StudySession::where('user_id', Auth::id())
            ->whereDate('start_time', now()->toDateString())
            ->orderBy('start_time', 'asc')
            ->get();
            
        if ($sessions->isEmpty()) {
            $activePlan = \App\Models\StudyPlan::where('user_id', Auth::id())->where('status', 'active')->first();
            if ($activePlan && in_array(strtolower(now()->format('l')), $activePlan->study_days ?? [])) {
                $subjects = $activePlan->subjects ?? [];
                $schedule = [];
                $startTime = now()->setTimeFrom($activePlan->preferred_start_time);
                foreach ($subjects as $idx => $subj) {
                    $schedule[] = [
                        'time' => $startTime->format('g:i A'),
                        'subject' => $subj,
                        'status' => 'Upcoming'
                    ];
                    $startTime->addMinutes($activePlan->study_duration + $activePlan->break_duration);
                }
                return $schedule;
            }
            
            return [
                ['time' => 'N/A', 'subject' => 'No sessions scheduled for today', 'status' => 'No Session']
            ];
        }
        
        return $sessions->map(function($s) {
            return [
                'time' => $s->start_time ? $s->start_time->format('g:i A') : 'N/A',
                'subject' => $s->subject . ($s->topic ? ' - ' . $s->topic : ''),
                'status' => ucfirst($s->status)
            ];
        })->toArray();
    }
    
    private function getProgressData()
    {
        $lastLog = \App\Models\Progress::where('user_id', Auth::id())->orderBy('date', 'desc')->first();
        return $lastLog && !empty($lastLog->subject_progress) ? $lastLog->subject_progress : [
            ['subject' => 'Mathematics', 'progress' => 75],
            ['subject' => 'Physics', 'progress' => 60],
            ['subject' => 'Chemistry', 'progress' => 45],
            ['subject' => 'English', 'progress' => 80],
        ];
    }
}


