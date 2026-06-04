<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DailyTaskController extends Controller
{
    public function index(){
        
    }

    public function store(TaskRequest $request) : RedirectResponse {
        $task = $request->validated();
        $task['completed'] = false;
        $task['created_date'] = now()->toDateString();

        $user = Auth::user();
        $task['user_id'] = $user->id;
        
        $task = Task::create($task);

        return to_route('dashboard.index')
        ->with([
            'success' => 'La tâche '.$task->title.' a été bien créée '
        ]);
    }

    public function completed($task_id){
        $task = Task::find($task_id);
        $task['completed'] = !$task->completed;
        $task->save();
        
        return to_route('dashboard.index');
    }

    public function destroy($daily_task){
        $task = Task::find($daily_task);
        $task_name = $task->title;
        $task->delete();

        return to_route('dashboard.index')
        ->with([
            'success' => 'La tâche '.$task_name.' à été bien supprimée'
        ]);;
    }

    public function edit($task) {
        $task = Task::find($task);
        return to_route('dashboard.index')->with('task', $task);
    }

    public function update(TaskRequest $request, $task_id){
        $current_task = Task::find($task_id);
        $task = $request->validated();
        
        $current_task->update($task);

        return to_route('dashboard.index')->with('success', 'La tâche '.$task['title'].' à été bien modifiée');
    }
}
