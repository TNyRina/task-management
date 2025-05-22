<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_status_task(){
        $user = User::factory()->create();
        $project = Task::factory([
            'user_id' => $user->id
        ])->create();

        assertEquals($project->status,0);

        $response = $this->post("/tasks/status/{$project}", [
            'code_status' => 2,
        ]);
        $response->assertStatus(302);

        // Rafraîchir les données depuis la base
        $project->refresh();

        // Vérifier que le statut a bien changé
        $this->assertEquals($project->status, 2);

        
    }
}
