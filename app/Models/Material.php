<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Material extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'materials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'file_path',
        'subject',
        'type',
        'tags',
        'is_important',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_important' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns the material.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the icon representation based on type.
     */
    public function getIconAttribute(): string
    {
        return match($this->type) {
            'notes' => '📄',
            'assignment' => '📊',
            'exam' => '📝',
            'guide' => '📖',
            default => '📁',
        };
    }

    /**
     * Get formatted uploaded date.
     */
    public function getUploadedAttribute(): string
    {
        return $this->created_at ? $this->created_at->format('M d') : '';
    }
}
