<?php


namespace Tests\traits;


use App\Models\Task;

trait TaskTrait
{
    /**
     * create new task
     *
     * @param null $employee
     * @param string $name
     * @param string $note
     * @param string $time
     *
     * @return mixed
     */
    public function createTask($user = null, $name = 'task name', $note = ' task description', $time = '04:20')
    {
        return $user->tasks()->create([
            'name' => $name,
            'note' => $note,
            'time' => $time,
        ]);
    }

    /**
     * create a task
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function addTask()
    {
        return Task::factory(1)->make();
    }
}
