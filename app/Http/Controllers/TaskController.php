<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        return Task::all();
    }

    public function store(StoreTaskRequest $request)
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
        $task = $request->validated();
        return $task;
    }
    
    public function destroy(Task $task)
    {
        $response = $task->delete();
        return response()->json([
            'message' => $response ? 'Tarefa deletado com sucesso!' : 'Erro ao deletar tarefa!',
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