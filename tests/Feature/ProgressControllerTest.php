<?php

namespace Tests\Feature;

use App\Models\Progress;
use App\Models\StudySession;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProgressControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_start_a_study_session(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('progress.start-session'));

        $response->assertRedirect(route('progress'));
        $this->assertDatabaseHas('study_session', [
            'user_id' => $user->id,
            'status' => 'in_progress',
        ]);
    }

    public function test_authenticated_user_can_stop_a_study_session_and_log_progress(): void
    {
        $user = User::factory()->create();
        $session = StudySession::create([
            'user_id' => $user->id,
            'status' => 'in_progress',
            'start_time' => now()->subMinutes(45),
        ]);

        $response = $this->actingAs($user)->post(route('progress.stop-session'));

        $response->assertRedirect(route('progress'));
        $this->assertDatabaseHas('study_session', [
            'id' => $session->id,
            'status' => 'completed',
        ]);
        $this->assertDatabaseHas('progress', [
            'user_id' => $user->id,
            'date' => now()->toDateString(),
        ]);
    }
}
