<?php

namespace App\Http\Controllers;

use App\Actions\Task\AddTaskAction;
use App\Actions\Task\ListTaskAction;
use App\Actions\Task\UpdateTaskAction;
use App\Http\Requests\DeleteTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function index(Request $request, ListTaskAction $action)
    {
        $task = $action->handle($request);
        return TaskResource::collection($task);
    }

    public function store(StoreTaskRequest $request, AddTaskAction $action)
    {
        $action->handle($request->validated());

        return response()->json(['status' => 'Task created successfully'], 201);
    }

    public function update(UpdateTaskRequest $request, UpdateTaskAction $action, Task $task)
    {
        $action->handle($task, $request->validated());

        return response()->json(['status' => 'Task updated successfully'], 200);
    }

    public function destroy(DeleteTaskRequest $request)
    {
        Task::where($request->validated())->delete();

        return response()->json(['status' => 'Task deleted successfully'], 200);
    }

}
