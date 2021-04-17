<?php


namespace Tests;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class BaseTestClass extends TestCase
{
    public $authUser = null;

    protected function setUp(): void
    {
        parent::setUp();

        Role::create(['name' => 'admin', 'guard_web' => 'web']);
        Role::create(['name' => 'employee', 'guard_web' => 'web']);
    }

    public function createUser($email = 'employee@gmail.com', $role = 'employee', $name = 'name1', $password = '123456')
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'email_verified_at' => now()
        ]);

        $user = $user->assignRole($role);

        return $user;
    }

    public function createAdmin()
    {
        return $this->createUser('admin@gmail.com', 'admin');
    }

    public function asEmployee(): BaseTestClass
    {
        $this->authUser = $this->createUser();

        return $this->actingAs($this->authUser);
    }

    public function asAdmin(): BaseTestClass
    {
        $this->authUser = $this->createAdmin();

        return $this->actingAs($this->authUser);
    }

}
