<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
   
    /**
     * Store a newly created task in storage.
     */
    public function create(TaskRequest $request, Project $project)
    {
        $task = $request->validated();
        $task['project_id'] = $project->id;
        $task['completed'] = false;
        $task = Task::create($task);

        return to_route('project.index')
        ->with([
            'success' => 'The task '.$task->title.' has been created'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {   
        $task->update($request->validated());
        return to_route('project.index')
            ->with([
                'success' => 'The task '.$task->title.' has been modified',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('project.index')
        ->with([
            'success' => 'The task '.$task->title.' has been deleted'
        ]);
    }
}
