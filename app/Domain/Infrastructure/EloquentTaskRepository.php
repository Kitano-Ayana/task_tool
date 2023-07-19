<?php

namespace App\Domain\Infrastructure;

use App\Domain\Task\Task as TaskEntity;
use App\Domain\Task\TaskRepositoryInterface;
use App\Models\Task;

class EloquentTaskRepository implements TaskRepositoryInterface
{
    private $eloquentTask;

    public function __construct(Task $eloquentTask)
    {
        $this->eloquentTask = $eloquentTask;
    }

    public function save(TaskEntity $taskEntity): void
    {
        $task = new Task();
        $task->name = $taskEntity->getName();
        $task->description = $taskEntity->getDescription();
        $task->deadline = $taskEntity->getDeadline();
        $task->save();
    }

    public function findById(int $id): Task
    {
        $eloquentTask = $this->eloquentTask->find($id);
        return Task::fromEloquent($eloquentTask);
    }
}
