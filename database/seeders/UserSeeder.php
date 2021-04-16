<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->addAdminUser();
        $this->addEmployeeUsers();
    }

    /**
     * add a admin
     */
    public function addAdminUser()
    {
        /** @var User $user */
        $user = User::factory(['email' => 'admin@admin.test'])->create();
        $user->assignRole('admin');
    }

    /**
     * assign employee users
     */
    public function addEmployeeUsers()
    {
        $users = User::factory()->count(2)->create();
        /** @var User $user */
        foreach ($users as $user) {
            $user->assignRole('employee');
        }
    }
}
