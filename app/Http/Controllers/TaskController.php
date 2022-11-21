<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(StoreTaksRequest $request)
    {
        $task = $request->validated();
        return Task::create($task);
    }

    public function show(Task $task)
    {
        return $task;
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task = $request->update();
        return $task;
    }
    
    public function destroy(Task $task)
    {
        $response = $task->delete();
    
        return response()->json([
            'content' => '',
            'response' => $response,
        ], $response ? 204 : 500);
    }

    public function taskCompleted(Task $task)
    {
        $task->update([
            'completed' => true
        ]);
        return $task;
    }
}