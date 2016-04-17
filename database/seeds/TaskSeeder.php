<?php

use Illuminate\Database\Seeder;
use App\Model\Task;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();

        factory(Task::class, 1000)->create();

        $this->command->info('Tasks table seeded!');
    }
}
