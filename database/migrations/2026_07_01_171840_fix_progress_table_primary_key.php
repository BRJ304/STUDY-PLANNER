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
        // 1. Remove AUTO_INCREMENT from user_id first so we can modify primary key
        DB::statement('ALTER TABLE progress MODIFY user_id BIGINT UNSIGNED NOT NULL');
        
        // 2. Drop the existing primary key (which was on user_id)
        DB::statement('ALTER TABLE progress DROP PRIMARY KEY');
        
        // 3. Make id the autoincrement primary key
        DB::statement('ALTER TABLE progress MODIFY id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY');
        
        // 4. Add unique key for user_id and date
        DB::statement('ALTER TABLE progress ADD UNIQUE KEY progress_user_id_date_unique (user_id, date)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE progress DROP INDEX progress_user_id_date_unique');
        DB::statement('ALTER TABLE progress MODIFY id BIGINT UNSIGNED NOT NULL');
        DB::statement('ALTER TABLE progress DROP PRIMARY KEY');
        DB::statement('ALTER TABLE progress MODIFY user_id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY');
    }
};
