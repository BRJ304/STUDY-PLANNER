<?php

namespace Tests\Feature;

use App\Models\Material;
use App\Models\Progress;
use App\Models\StudyPlan;
use App\Models\StudySession;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FullUserJourneyTest extends TestCase
{
    use RefreshDatabase;

    /** Public marketing + auth pages render for guests. */
    public function test_public_pages_load(): void
    {
        foreach (['/', '/about-us', '/contact-us', '/features', '/login', '/register', '/forgot-password'] as $path) {
            $this->get($path)->assertOk();
        }
    }

    /** Authenticated areas redirect guests to login. */
    public function test_protected_routes_require_auth(): void
    {
        foreach (['/dashboard', '/profile', '/study-plan', '/progress', '/materials', '/settings'] as $path) {
            $this->get($path)->assertRedirect('/login');
        }
    }

    /** Register via HTTP, then log in via HTTP. */
    public function test_user_can_register_and_login(): void
    {
        $this->post(route('register.post'), [
            'name' => 'Journey User',
            'email' => 'journey@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect('/login');

        $this->assertDatabaseHas('users', ['email' => 'journey@example.com']);

        $this->post(route('login.post'), [
            'email' => 'journey@example.com',
            'password' => 'password123',
        ])->assertRedirect('/dashboard');

        $this->assertAuthenticated();
    }

    /** Dashboard and each authenticated page renders. */
    public function test_authenticated_pages_load(): void
    {
        $user = User::factory()->create();

        foreach (['/dashboard', '/profile', '/study-plan', '/generate-new-plan', '/progress', '/materials', '/settings'] as $path) {
            $this->actingAs($user)->get($path)->assertOk();
        }
    }

    /** Create, update, and delete a study plan. */
    public function test_study_plan_crud(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('study-plan.store'), [
            'title' => 'My Plan',
            'description' => 'desc',
            'subjects' => ['math', 'science'],
            'preferred_start_time' => '09:00',
            'preferred_end_time' => '17:00',
            'study_duration' => 60,
            'break_duration' => 15,
            'study_days' => ['monday', 'tuesday'],
            'weekly_goal_hours' => 10,
            'difficulty_level' => 'medium',
        ])->assertRedirect(route('study-plan'));

        $plan = StudyPlan::where('user_id', $user->id)->firstOrFail();

        $this->actingAs($user)->put(route('study-plan.update', $plan->id), [
            'title' => 'Updated Plan',
            'status' => 'paused',
        ])->assertRedirect();
        $this->assertDatabaseHas('study_plans', ['id' => $plan->id, 'title' => 'Updated Plan', 'status' => 'paused']);

        $this->actingAs($user)->delete(route('study-plan.destroy', $plan->id))->assertRedirect();
        $this->assertDatabaseMissing('study_plans', ['id' => $plan->id]);
    }

    /** Log progress, run a start/stop session, and export. */
    public function test_progress_logging_sessions_and_export(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('progress.store'), [
            'daily_mood' => 'good',
            'focus_level' => 8,
            'daily_notes' => 'productive day',
            'hours_studied' => 3.5,
            'topics_mastered' => 2,
        ])->assertRedirect();
        $this->assertDatabaseHas('progress', ['user_id' => $user->id, 'daily_mood' => 'good']);

        $this->actingAs($user)->post(route('progress.start-session'))->assertRedirect(route('progress'));
        $this->assertDatabaseHas('study_session', ['user_id' => $user->id, 'status' => 'in_progress']);

        $this->actingAs($user)->post(route('progress.stop-session'))->assertRedirect(route('progress'));
        $this->assertDatabaseHas('study_session', ['user_id' => $user->id, 'status' => 'completed']);

        $this->actingAs($user)->get(route('progress.export'))
            ->assertOk()
            ->assertJson(['email' => $user->email]);
    }

    /** Upload, download, and delete a study material. */
    public function test_materials_upload_download_delete(): void
    {
        Storage::fake('local');
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('materials.store'), [
            'material_title' => 'Notes',
            'material_description' => 'chapter 1',
            'material_subject' => 'Math',
            'material_type' => 'notes',
            'material_file' => UploadedFile::fake()->create('notes.pdf', 120, 'application/pdf'),
        ])->assertRedirect();

        $material = Material::where('user_id', $user->id)->firstOrFail();
        Storage::disk('local')->assertExists($material->file_path);

        $this->actingAs($user)->get(route('materials.download', $material->id))->assertOk();

        $this->actingAs($user)->delete(route('materials.destroy', $material->id))->assertRedirect();
        $this->assertDatabaseMissing('materials', ['id' => $material->id]);
        Storage::disk('local')->assertMissing($material->file_path);
    }

    /** A user may not upload an executable/script disguised as a material. */
    public function test_materials_upload_rejects_disallowed_type(): void
    {
        Storage::fake('local');
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('materials.store'), [
            'material_title' => 'Bad',
            'material_subject' => 'Math',
            'material_type' => 'notes',
            'material_file' => UploadedFile::fake()->create('shell.php', 10, 'application/x-php'),
        ])->assertSessionHasErrors('material_file');

        $this->assertDatabaseCount('materials', 0);
    }

    /** Update profile, and each settings section. */
    public function test_profile_and_settings_update(): void
    {
        $user = User::factory()->create(['password' => Hash::make('oldpassword')]);

        $this->actingAs($user)->put(route('profile.update'), [
            'name' => 'New Name',
            'email' => 'new@example.com',
            'school' => 'MIT',
            'major' => 'CS',
        ])->assertRedirect();
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'New Name', 'email' => 'new@example.com']);

        $this->actingAs($user)->put(route('settings.password'), [
            'current_password' => 'oldpassword',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ])->assertRedirect();
        $this->assertTrue(Hash::check('newpassword123', $user->fresh()->password));

        // Mirror production: Auth::user() is hydrated from the DB (with column
        // defaults), so reload the instance before exercising partial updates.
        $user->refresh();

        $this->actingAs($user)->put(route('settings.notifications'), ['email_notifications' => '1'])->assertRedirect();
        $this->actingAs($user)->put(route('settings.privacy'), ['profile_visibility' => 'public'])->assertRedirect();
        $this->actingAs($user)->put(route('settings.preferences'), ['language' => 'en', 'theme' => 'dark'])->assertRedirect();
        $this->actingAs($user)->put(route('settings.study'), ['weekly_goal_hours' => 12])->assertRedirect();
    }

    /** Logout ends the session. */
    public function test_logout(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)->post(route('logout'))->assertRedirect('/login');
        $this->assertGuest();
    }

    /** Account deletion removes the user with a correct password. */
    public function test_account_deletion(): void
    {
        $user = User::factory()->create(['password' => Hash::make('secret123')]);

        $this->actingAs($user)->delete(route('settings.account.delete'), ['password' => 'secret123'])
            ->assertRedirect('/');

        $this->assertGuest();
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
