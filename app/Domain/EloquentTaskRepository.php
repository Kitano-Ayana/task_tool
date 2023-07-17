<?php

namespace App\Domain\Infrastructure;

use App\Domain\Task\Task;
use App\Domain\Task\TaskRepositoryInterface;

class EloquentTaskRepository implements TaskRepositoryInterface
{
    private $eloquentTask;

    public function __construct(Task $eloquentTask)
    {
        $this->eloquentTask = $eloquentTask;
    }

    public function save(Task $task): void
    {
        // ...
    }

    public function findById(int $id): Task
    {
        $eloquentTask = $this->eloquentTask->find($id);
        return Task::fromEloquent($eloquentTask);
    }
}
