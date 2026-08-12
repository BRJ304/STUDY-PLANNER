<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('mobile')->nullable();
            $table->text('bio')->nullable();
            $table->string('school')->nullable();
            $table->string('major')->nullable();
            $table->string('user_image')->nullable();
            $table->string('goal')->nullable();
            $table->string('learning_style')->nullable();
            $table->string('language')->nullable();
            $table->string('weekly_goal_hour')->nullable();
            $table->string('session')->nullable();
            // No timestamps: UserInformation model sets $timestamps = false.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_information');
    }
};
