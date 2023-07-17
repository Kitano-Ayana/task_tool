<?php

namespace App\UseCases\Task;

use App\Domain\Task\Task;
use App\Domain\Task\TaskRepositoryInterface;

class EditTaskAction
{
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function execute(int $id, array $taskData): Task
    {
        $task = $this->taskRepository->findById($id);

        $task->setName($taskData['name']);
        $task->setDescription($taskData['description']);
        $task->setDeadline($taskData['deadline']);

        $this->taskRepository->save($task);

        return $task;
    }
}
