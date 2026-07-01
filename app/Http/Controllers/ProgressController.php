<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    /**
     * Show progress page
     */
    public function index()
    {
        $user = Auth::user();
        
        // Retrieve live progress records
        $progressRecords = \App\Models\Progress::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->get();
            
        $stats = [
            'topics_mastered' => (int)$progressRecords->sum('topics_mastered'),
            'total_topics' => 24, 
            'study_time' => round((float)$progressRecords->sum('hours_studied'), 1),
            'achievements' => count($progressRecords) > 0 ? min(3 + count($progressRecords), 12) : 0,
        ];
        
        $lastProgress = $progressRecords->first();
        
        $subjectPerformance = $lastProgress && !empty($lastProgress->subject_progress) ? $lastProgress->subject_progress : [
            ['subject' => 'Mathematics', 'progress' => 85],
            ['subject' => 'Physics', 'progress' => 72],
            ['subject' => 'Chemistry', 'progress' => 60],
            ['subject' => 'English', 'progress' => 90],
        ];
        
        $weeklyProgress = \App\Models\Progress::where('user_id', $user->id)
            ->orderBy('date', 'asc')
            ->limit(5)
            ->get()
            ->map(function($p) {
                return [
                    'week' => $p->date ? $p->date->format('M d') : 'N/A',
                    'hours' => (float)$p->hours_studied
                ];
            })->toArray();
            
        if (empty($weeklyProgress)) {
            $weeklyProgress = [
                ['week' => 'Week 1', 'hours' => 5],
                ['week' => 'Week 2', 'hours' => 12],
                ['week' => 'Week 3', 'hours' => 8],
                ['week' => 'Week 4', 'hours' => 15],
                ['week' => 'Week 5', 'hours' => 18],
            ];
        }
        
        return view('dashboard.progress', compact('user', 'subjectPerformance', 'weeklyProgress', 'stats'));
    }
    
    /**
     * Store progress data
     */
    public function store(Request $request)
    {
        $request->validate([
            'daily_mood' => 'required|string',
            'focus_level' => 'required|integer|min:1|max:10',
            'daily_notes' => 'nullable|string|max:500',
            'hours_studied' => 'required|numeric|min:0|max:24',
            'topics_mastered' => 'nullable|integer|min:0',
        ]);
        
        // Setup mock subject progress updating based on hours studied or random bump
        $subjectProgress = [
            ['subject' => 'Mathematics', 'progress' => min(100, 75 + rand(1, 5))],
            ['subject' => 'Physics', 'progress' => min(100, 60 + rand(1, 5))],
            ['subject' => 'Chemistry', 'progress' => min(100, 45 + rand(1, 5))],
            ['subject' => 'English', 'progress' => min(100, 80 + rand(1, 5))],
        ];
        
        \App\Models\Progress::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'date' => now()->toDateString(),
            ],
            [
                'daily_mood' => $request->daily_mood,
                'focus_level' => $request->focus_level,
                'daily_notes' => $request->daily_notes,
                'hours_studied' => $request->hours_studied,
                'subject_progress' => $subjectProgress,
                'topics_mastered' => $request->input('topics_mastered', 0),
                'exam_readiness' => min(100, 70 + rand(1, 20)),
            ]
        );
        
        return back()->with('success', 'Progress logged successfully!');
    }
    
    /**
     * Export progress data
     */
    public function export()
    {
        $user = Auth::user();
        $progressRecords = \App\Models\Progress::where('user_id', $user->id)
            ->orderBy('date', 'desc')
            ->get();
            
        $data = [
            'user' => $user->name,
            'email' => $user->email,
            'export_date' => now(),
            'progress_data' => $progressRecords,
        ];
        
        return response()->json($data, 200, [
            'Content-Disposition' => 'attachment; filename="progress_data.json"'
        ]);
    }
}