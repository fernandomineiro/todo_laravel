<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Log;
use App\Models\User;

class LogTest extends TestCase
{
    use RefreshDatabase;

    public function test_log_creation()
    {
        $user = User::factory()->create();
        $log = Log::factory()->create(['user_id' => $user->id]);

        $this->assertDatabaseHas('logs', [
            'action' => $log->action,
            'description' => $log->description,
            'user_id' => $user->id,
        ]);
    }
}