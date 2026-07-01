<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
    'name', 
    'email', 
    'password',
    'email_notifications',
    'push_notifications',
    'study_reminders',
    'progress_reports',
    'exam_alerts',
    'marketing_emails',
    'profile_visibility',
    'study_data_sharing',
    'show_progress',
    'show_online_status',
    'language',
    'theme',
    'font_size',
    'timezone',
    'study_preference',
    'learning_style',
    'goal',
    'weekly_goal_hours',
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationships
     */
    public function info()
    {
        return $this->hasOne(UserInformation::class, 'user_id');
    }

    public function studyPlans()
    {
        return $this->hasMany(StudyPlan::class);
    }

    public function studySessions()
    {
        return $this->hasMany(StudySession::class);
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
