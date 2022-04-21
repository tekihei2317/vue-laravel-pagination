<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Enums\TaskStatus;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            Task::create([
                'name' => "todo{$i}",
                'description' => "{$i}個目",
                'task_status_id' => collect(TaskStatus::cases())->random()->value,
            ]);
        }
    }
}
