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


    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDeadline()
    {
        return $this->deadline;
    }

}
