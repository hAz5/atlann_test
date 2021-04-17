<?php


namespace Tests\traits;


use App\Models\User;

trait UserTrait
{
    /**
     * create new user
     *
     * @param string $email user email
     *
     * @return User
     */
    public function createUser($email = 'employee@employee.test')
    {
        $user = User::factory(['email' => $email])->create();
        $user->assignRole('employee');

        return $user;
    }
}
