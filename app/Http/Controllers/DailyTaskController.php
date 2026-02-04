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

        $user = Auth::user();
        $task['user_id'] = $user->id;
        
        $task = Task::create($task);

        return to_route('dashboard.index')
        ->with([
            'success' => 'The task '.$task->title.' has been created'
        ]);
    }
}
