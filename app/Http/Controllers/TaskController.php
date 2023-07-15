<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;
use App\UseCases\Task\CreateTaskAction;

class TaskController extends Controller
{
    private $createTaskAction;

    public function __construct(CreateTaskAction $createTaskAction)
    {
        $this->createTaskAction = $createTaskAction;
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $this->createTaskAction->execute($request->all());

        return response()->json(['message' => 'Task created successfully', 'task' => $task], 201);
    }
}
