<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1. There are two user types: employee and admin.
        Role::create(['name' =>'employee', 'guard_name' => 'web']);
        Role::create(['name' =>'admin', 'guard_name' => 'web']);
    }
}
