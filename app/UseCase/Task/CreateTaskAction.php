<?php

namespace App\UseCases\Task;

use App\Domain\Task\TaskRepositoryInterface;
use App\Domain\Task\Task;
use App\Domain\Task\TaskName;
use App\Domain\Task\TaskDescription;
use App\Domain\Task\TaskDeadline;

class CreateTaskAction
{
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(array $data): Task
    {
        $task = new Task(
            new TaskName($data['name']),
            new TaskDescription($data['description']),
            new TaskDeadline($data['deadline'])
        );

        return $this->taskRepository->save($task);
    }
}
