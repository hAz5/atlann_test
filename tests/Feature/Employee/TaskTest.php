<?php

namespace Tests\Feature\Employee;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\BaseTestClass;
use Tests\TestCase;
use Tests\traits\TaskTrait;

class TaskTest extends BaseTestClass
{
    use RefreshDatabase, TaskTrait;

//    public function test_employee_can_see_task_create_form()
//    {
//
//        $response = $this->asEmployee()->get(route('employee.task.create'));
//
//        $response->assertSuccessful();
//        $response->assertViewIs('employee.task.create');
//    }
//
//    public function test_employee_can_create_task()
//    {
//        // make task
//        $task = $this->addTask()[0];
//
//        // store task
//       $this->asEmployee()->post(route('employee.task.store'), [
//            'name' => $task->name,
//            'note' => $task->note,
//            'time' => $task->time,
//        ]);
//
//
//        $savedTask = Task::find(1);
//
//        $this->assertEquals($task->name, $savedTask->name);
//        $this->assertEquals($task->note, $savedTask->note);
//        $this->assertEquals($task->time, $savedTask->time);
//    }
//
//    public function test_employee_can_update_task()
//    {
//        $flow = $this->asEmployee();
//
//        // make task
//        $task = $this->createTask($this->authUser);
//
//        // store task
//       $update = $flow->put(route('employee.task.update', $task->id), [
//            'name' => 'test',
//            'note' => 'note',
//            'time' => 30,
//        ]);
//
//        $task = Task::find(1);
//
//        $this->assertEquals($task->name, 'test');
//        $this->assertEquals($task->note, 'note');
//        $this->assertEquals($task->time, 30);
//    }

    public function test_employee_can_destroy_task(){

        $flow = $this->asEmployee();

        // create task
        $task = $this->createTask($this->authUser);
        $id = $task->id;

        // delete task
        $delete = $flow->delete(route('employee.task.destroy', $id));
//         try to visit edit page for deleted task
        $response = $flow->get(route('employee.task.edit', $id));

        $response->assertStatus(302);
        $delete->assertStatus(302);
    }


    public function test_unauthenticated_employee_cannot_visit_tasks_index(){

        // try to visit task index
        $response =  $this->get(route('employee.task.index'));

        $response->assertRedirect(route('login'));
    }

}
