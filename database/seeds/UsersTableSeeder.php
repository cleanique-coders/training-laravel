<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Empty the tasks table
        App\User::truncate();

        // Create a thousand tasks
        factory(App\User::class, 10)->create();

        // Debug message
        $this->command->info('users table seeded!');
    }
}
