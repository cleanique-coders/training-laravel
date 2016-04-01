<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Empty the tasks table
        DB::table('tasks')->truncate();

        // Create a thousand tasks
        factory(App\Task::class, 1000)->create();

        // Debug message
        $this->command->info('tasks table seeded!');
    }
}
