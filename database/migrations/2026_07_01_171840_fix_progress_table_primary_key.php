<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // No-op: the create_progress_table migration now builds the table with the
        // correct primary key (auto-increment `id`) and unique(user_id, date). This
        // migration originally used MySQL-only raw DDL to retrofit a hand-created
        // table and is kept as a no-op so existing migration history stays intact.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No-op. See up().
    }
};
