<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInformation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_information';

    /**
     * Indicates if the model should be timestamps.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'mobile',
        'bio',
        'school',
        'major',
        'user_image',
        'goal',
        'learning_style',
        'language',
        'weekly_goal_hour',
        'session',
    ];

    /**
     * Get the user that owns this information record.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
