<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('progress', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->decimal('hours_studied', 5, 2)->default(0);
            $table->string('daily_mood')->nullable();
            $table->unsignedTinyInteger('focus_level')->nullable();
            $table->text('daily_notes')->nullable();
            $table->json('subject_progress')->nullable();
            $table->integer('topics_mastered')->default(0);
            $table->text('struggling_topics')->nullable();
            $table->text('mastered_topics')->nullable();
            $table->timestamps();

            // One progress record per user per day.
            $table->unique(['user_id', 'date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('progress');
    }
};
