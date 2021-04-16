<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
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
        $users = User::role('employee')->get();

        foreach ($users as $user) {
            $user->tasks()->saveMany(Task::factory(10)->make());
        }
    }
}
