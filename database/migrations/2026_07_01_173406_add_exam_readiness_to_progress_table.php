<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->integer('exam_readiness')->nullable()->default(0)->after('hours_studied');
        });

        // Make user_image nullable in user_information table. The column is already
        // created nullable by create_user_information_table; this raw statement only
        // applies to pre-existing MySQL databases and is skipped elsewhere (SQLite).
        if (\Illuminate\Support\Facades\DB::getDriverName() === 'mysql') {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE user_information MODIFY user_image VARCHAR(255) NULL");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->dropColumn('exam_readiness');
        });

        // Make user_image non-nullable again (MySQL only).
        if (\Illuminate\Support\Facades\DB::getDriverName() === 'mysql') {
            \Illuminate\Support\Facades\DB::statement("ALTER TABLE user_information MODIFY user_image VARCHAR(255) NOT NULL");
        }
    }
};
