<?php

use Illuminate\Broadcasting\Channel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->text('new_description')->nullable();
        });

        DB::statement('UPDATE tasks SET new_description = description');

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('new_description', 'description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->text('old_description')->nullable(false);
        });

        DB::statement('UPDATE tasks SET old_description = description');

        Schema::table('tasks', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('old_description', 'description');
        });
    }
};
