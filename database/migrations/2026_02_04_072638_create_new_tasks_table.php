<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Project;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('new_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Project::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title', length: 200);
            $table->text('description');
            $table->boolean('completed');
            $table->timestamps();
        });

        Schema::drop('tasks');
        Schema::drop('sub_tasks');
        Schema::rename('new_tasks', 'tasks');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_tasks');
    }
};
