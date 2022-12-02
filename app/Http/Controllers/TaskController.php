<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return Task::when($request->task_name, function($query) use($request){
            $query->where('task_name', 'ILIKE', '%'. $request->task_name .'%');
        })
        ->when(isset($request->completed), function($query) use($request){
            $query->where('completed', $request->completed);
        })
        ->when($request->order_by_created_at, function($query) use($request){
            $query->orderBy('created_at', $request->order_by_created_at);
        })
        ->get();
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