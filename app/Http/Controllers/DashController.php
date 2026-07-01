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
        // Calculate study hours (replace with actual logic)
        return 24.5;
    }
    
    private function getTopicsMastered()
    {
        // Count mastered topics (replace with actual logic)
        return 18;
    }
    
    private function getExamReadiness()
    {
        // Calculate exam readiness (replace with actual logic)
        return 87;
    }
    
    private function getStudyStreak()
    {
        // Calculate study streak (replace with actual logic)
        return 12;
    }
    
    private function getTodaySchedule()
    {
        // Get today's schedule (replace with actual logic)
        return [
            ['time' => '9:00 AM', 'subject' => 'Mathematics', 'status' => 'In Progress'],
            ['time' => '10:30 AM', 'subject' => 'Physics', 'status' => 'Upcoming'],
            ['time' => '1:00 PM', 'subject' => 'Chemistry', 'status' => 'Upcoming'],
        ];
    }
    
    private function getProgressData()
    {
        // Get progress data (replace with actual logic)
        return [
            ['subject' => 'Mathematics', 'progress' => 75],
            ['subject' => 'Physics', 'progress' => 60],
            ['subject' => 'Chemistry', 'progress' => 45],
            ['subject' => 'English', 'progress' => 80],
        ];
    }
}


