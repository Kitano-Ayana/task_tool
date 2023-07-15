<?php

namespace App\Domain\Task;

class TaskName
{
    private $value;

    public function __construct(string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException('Task name cannot be empty.');
        }

        $this->value = $value;
    }

    // getter methods ...
}
