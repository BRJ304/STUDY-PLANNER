<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Progress extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'progress';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'date',
        'hours_studied',
        'daily_mood',
        'focus_level',
        'daily_notes',
        'subject_progress',
        'topics_mastered',
        'struggling_topics',
        'mastered_topics',
        'exam_readiness',
        'created_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'hours_studied' => 'decimal:2',
        'focus_level' => 'integer',
        'subject_progress' => 'array', // JSON field
        'topics_mastered' => 'integer',
        'exam_readiness' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Store `date` as a pure Y-m-d string (portable across MySQL/SQLite) while
     * still exposing it as a Carbon instance when read.
     */
    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Carbon::parse($value) : null,
            set: fn ($value) => $value ? Carbon::parse($value)->toDateString() : null,
        );
    }

    /**
     * Get the user that owns the progress record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    /**
     * Get the mood emoji.
     */
    public function getMoodEmojiAttribute(): string
    {
        return match($this->daily_mood) {
            'excellent' => '😄',
            'good' => '🙂',
            'okay' => '😐',
            'bad' => '😞',
            'terrible' => '😭',
            default => '🤔',
        };
    }

    /**
     * Get the focus level label.
     */
    public function getFocusLabelAttribute(): string
    {
        if ($this->focus_level >= 8) {
            return 'Excellent Focus';
        } elseif ($this->focus_level >= 6) {
            return 'Good Focus';
        } elseif ($this->focus_level >= 4) {
            return 'Average Focus';
        } else {
            return 'Poor Focus';
        }
    }

    /**
     * Get the overall productivity score.
     */
    public function getProductivityScoreAttribute(): int
    {
        $score = 0;
        
        // Focus level (max 40)
        $score += ($this->focus_level / 10) * 40;
        
        // Hours studied (max 40)
        $hoursScore = min($this->hours_studied / 4, 1) * 40;
        $score += $hoursScore;
        
        // Topics mastered (max 20)
        $topicsScore = min($this->topics_mastered / 10, 1) * 20;
        $score += $topicsScore;
        
        return round($score);
    }
}