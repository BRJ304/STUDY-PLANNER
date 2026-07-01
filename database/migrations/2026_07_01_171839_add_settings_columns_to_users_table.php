<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('email_notifications')->default(true);
            $table->boolean('push_notifications')->default(true);
            $table->boolean('study_reminders')->default(true);
            $table->boolean('progress_reports')->default(true);
            $table->boolean('exam_alerts')->default(true);
            $table->boolean('marketing_emails')->default(false);
            $table->string('profile_visibility')->default('private');
            $table->string('study_data_sharing')->default('none');
            $table->boolean('show_progress')->default(false);
            $table->boolean('show_online_status')->default(true);
            $table->string('language')->default('en');
            $table->string('theme')->default('light');
            $table->string('font_size')->default('medium');
            $table->string('timezone')->default('UTC');
            $table->string('study_preference')->default('afternoon');
            $table->string('learning_style')->default('visual');
            $table->string('goal')->default('excellent');
            $table->integer('weekly_goal_hours')->default(10);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
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
            ]);
        });
    }
};
