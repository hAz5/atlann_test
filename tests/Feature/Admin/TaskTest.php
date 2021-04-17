<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\BaseTestClass;
use Tests\TestCase;

class TaskTest extends BaseTestClass
{
    use RefreshDatabase;

    public function test_unauthenticated_admin_cannot_visit_tasks_index_page()
    {
        // try to visit task index
        $response =  $this->get(route('admin.task.index'));

        $response->assertRedirect(route('login'));
    }
}
