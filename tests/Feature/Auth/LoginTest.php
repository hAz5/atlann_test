<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\BaseTestClass;
use Tests\HasUser;
use Tests\TestCase;

class LoginTest extends BaseTestClass
{
    use RefreshDatabase;


    public function test_user_can_view_a_login_form()
    {
        // visit login page
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    public function test_user_with_role_employee_can_login()
    {
        $user = $this->createUser();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '123456',
        ]);

        // must redirect to /employee/tasks and and authenticated user must the created user
        $response->assertRedirect('/employee/tasks');
        $this->assertAuthenticatedAs($user);

    }

    public function test_user_with_role_admin_can_login()
    {
        // first create user with admin role
        $user = $this->createAdmin();

        // send credential
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '123456',
        ]);


        // must redirect to /admin/tasks and authenticated user must match the created user
        $response->assertRedirect('/admin/tasks');
        $this->assertAuthenticatedAs($user);

    }


    public function test_authenticated_user_cannot_visit_login_page()
    {
        // create user
        $user = $this->createUser();

        // try to visit login page
        $response = $this->actingAs($user)->get('/login');
        $response->assertStatus(302);
    }


    public function test_user_cannot_login_with_incorrect_password()
    {
        // create user
        $user = $this->createUser();


        // send credential with wrong password
        $response = $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertGuest();

    }


}
