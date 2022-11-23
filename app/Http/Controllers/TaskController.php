<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

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
        $task = $request->update();
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
