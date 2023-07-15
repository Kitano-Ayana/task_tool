<?php

namespace Tests\Feature;

use App\Domain\Task\Task;
use App\Domain\Task\TaskName;
use App\Domain\Task\TaskDescription;
use App\Domain\Task\TaskDeadline;
use App\UseCases\Task\CreateTaskAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateTask_タスク作成テスト()
    {
        // テストデータの作成
        $taskName = new TaskName('Sample Task');
        $taskDescription = new TaskDescription('This is a sample task for testing');
        $taskDeadline = new TaskDeadline('2023-07-13');

        // アクションの実行
        $action = new CreateTaskAction();
        $task = $action->execute($taskName, $taskDescription, $taskDeadline);

        // データベースにデータが保存されたことを確認
        $this->assertDatabaseHas('tasks', [
            'name' => 'Sample Task',
            'description' => 'This is a sample task for testing',
            'deadline' => '2023-07-13',
        ]);

        // 返されたタスクオブジェクトが正しいことを確認
        $this->assertInstanceOf(Task::class, $task);
        $this->assertEquals('Sample Task', $task->getName());
        $this->assertEquals('This is a sample task for testing', $task->getDescription());
        $this->assertEquals('2023-07-13', $task->getDeadline());
    }
}
