<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\BaseTestClass;
use Tests\TestCase;
use Tests\traits\TaskTrait;
use Tests\traits\UserTrait;

class UserTest extends BaseTestClass
{
    use RefreshDatabase, UserTrait, TaskTrait;

    public function test_unauthenticated_admin_cannot_visit_users_index_page()
    {
        // try to visit task index
        $response =  $this->get(route('admin.user.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_visit_users_tasks_page()
    {
        $flow = $this->asAdmin();
        $flow->authUser->assignRole('admin');
        $user = $this->createUser();
        $tasks = $this->createTask($user);

        // try to visit task index
        $response =  $flow->get(route('admin.user.show', $user));

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee($user->email);
    }
}
