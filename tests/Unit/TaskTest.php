<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use App\Models\User;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_task_creation()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create(['user_id' => $user->id]);

        $this->assertDatabaseHas('tasks', [
            'title' => $task->title,
            'description' => $task->description,
            'user_id' => $user->id,
        ]);
    }

    public function test_task_update()
    {
        $task = Task::factory()->create();
        $updatedTitle = 'Updated Task Title';

        $task->update(['title' => $updatedTitle]);

        $this->assertDatabaseHas('tasks', ['title' => $updatedTitle]);
    }

    public function test_task_deletion()
    {
        $task = Task::factory()->create();
        $task->delete();

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);
    }

    public function test_task_completion()
    {
        $task = Task::factory()->create(['completed' => false]);

        $task->update(['completed' => true]);

        $this->assertTrue($task->completed);
    }
}