<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudyPlan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   protected $table = 'study-plan';
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'preferred_start_time',
        'preferred_end_time',
        'study_duration',
        'break_duration',
        'study_days',
        'weekly_goal_hours',
        'subjects',
        'difficulty_level',
        'study_style',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
  protected $casts = [
    'study_days' => 'array',
    'subjects' => 'array',

    'preferred_start_time' => 'datetime:H:i',
    'preferred_end_time' => 'datetime:H:i',
];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Get the user that owns the study plan.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the study sessions for the study plan.
     */
    public function studySessions(): HasMany
    {
        return $this->hasMany(StudySession::class);
    }

    /**
     * Get the progress records for the study plan.
     */
    public function progress(): HasMany
    {
        return $this->hasMany(Progress::class);
    }

    /**
     * Scope a query to only include active study plans.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to only include completed study plans.
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope a query to only include paused study plans.
     */
    public function scopePaused($query)
    {
        return $query->where('status', 'paused');
    }

    /**
     * Scope a query to filter by subject.
     */
    public function scopeWithSubject($query, $subject)
    {
        return $query->whereJsonContains('subjects', $subject);
    }

    /**
     * Get the formatted study days as a readable string.
     */
    public function getFormattedStudyDaysAttribute(): string
    {
        if (empty($this->study_days)) {
            return 'No days selected';
        }

        $days = [
            'monday' => 'Mon',
            'tuesday' => 'Tue',
            'wednesday' => 'Wed',
            'thursday' => 'Thu',
            'friday' => 'Fri',
            'saturday' => 'Sat',
            'sunday' => 'Sun',
        ];

        $selectedDays = array_map(function ($day) use ($days) {
            return $days[$day] ?? $day;
        }, $this->study_days);

        return implode(', ', $selectedDays);
    }

    /**
     * Get the total hours per week based on study days and duration.
     */
    public function getTotalWeeklyHoursAttribute(): float
    {
        if (empty($this->study_days) || !$this->study_duration) {
            return 0;
        }

        $daysCount = count($this->study_days);
        $hoursPerSession = $this->study_duration / 60; // Convert minutes to hours
        
        return $daysCount * $hoursPerSession;
    }

    /**
     * Get the status badge color.
     */
    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'active' => 'success',
            'completed' => 'primary',
            'paused' => 'warning',
            default => 'secondary',
        };
    }

    /**
     * Get the difficulty level label.
     */
    public function getDifficultyLabelAttribute(): string
    {
        return match($this->difficulty_level) {
            'easy' => 'Easy',
            'medium' => 'Medium',
            'hard' => 'Hard',
            default => 'Medium',
        };
    }



    /**
     * Check if the study plan is active.
     */
    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    /**
     * Check if the study plan is completed.
     */
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Check if the study plan is paused.
     */
    public function isPaused(): bool
    {
        return $this->status === 'paused';
    }

   
    /**
     * Get the study progress percentage.
     */
    public function getProgressPercentageAttribute(): int
    {
        $totalSessions = $this->studySessions()->count();
        if ($totalSessions === 0) {
            return 0;
        }

        $completedSessions = $this->studySessions()->where('status', 'completed')->count();
        return round(($completedSessions / $totalSessions) * 100);
    }

    /**
     * Get the total study hours completed.
     */
    public function getTotalCompletedHoursAttribute(): float
    {
        return $this->studySessions()
            ->where('status', 'completed')
            ->sum('duration') / 60; // Convert minutes to hours
    }

    /**
     * Get the upcoming study sessions.
     */
    public function getUpcomingSessionsAttribute()
    {
        return $this->studySessions()
            ->where('status', 'scheduled')
            ->where('start_time', '>=', now())
            ->orderBy('start_time')
            ->get();
    }

    /**
     * Get the recent study sessions.
     */
    public function getRecentSessionsAttribute()
    {
        return $this->studySessions()
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
    }

    /**
     * Get a readable summary of the study plan.
     */
    public function getSummaryAttribute(): string
    {
        $parts = [];
        
        if ($this->title) {
            $parts[] = $this->title;
        }
        
        if ($this->study_days) {
            $parts[] = 'Studies on: ' . $this->formatted_study_days;
        }
        
        if ($this->weekly_goal_hours) {
            $parts[] = 'Goal: ' . $this->weekly_goal_hours . ' hours/week';
        }
        
        
        return implode(' | ', $parts);
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-set status when creating
        static::creating(function ($studyPlan) {
            if (empty($studyPlan->status)) {
                $studyPlan->status = 'active';
            }
        });

        // Auto-set weekly goal hours if not set
        static::saving(function ($studyPlan) {
            if (empty($studyPlan->weekly_goal_hours) && !empty($studyPlan->study_days) && !empty($studyPlan->study_duration)) {
                $daysCount = count($studyPlan->study_days);
                $hoursPerSession = $studyPlan->study_duration / 60;
                $studyPlan->weekly_goal_hours = round($daysCount * $hoursPerSession);
            }
        });
    }
}