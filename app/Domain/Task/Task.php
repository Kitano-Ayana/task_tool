<?php

namespace App\Domain\Task;

class Task
{
    private $name;
    private $description;
    private $deadline;

    public function __construct(TaskName $name, TaskDescription $description, TaskDeadline $deadline)
    {
        $this->name = $name;
        $this->description = $description;
        $this->deadline = $deadline;
    }

    // getter methods ...
}
