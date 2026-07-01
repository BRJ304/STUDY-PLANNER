<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudyPlanControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_create_a_study_plan(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('study-plan.store'), [
            'title' => 'Final Exam Plan',
            'description' => 'Prepare for finals',
            'subjects' => ['math', 'science'],
            'preferred_start_time' => '09:00',
            'preferred_end_time' => '18:00',
            'study_duration' => 90,
            'break_duration' => 15,
            'study_days' => ['monday', 'wednesday', 'friday'],
            'weekly_goal_hours' => 12,
            'difficulty_level' => 'medium',
        ]);

        $response->assertRedirect(route('study-plan'));
        $this->assertDatabaseHas('study_plans', [
            'user_id' => $user->id,
            'title' => 'Final Exam Plan',
        ]);
    }
}
