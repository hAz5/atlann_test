<?php

namespace App\Repository\Eloquent;

use App\Models\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * get user with task and roles
     *
     * @return Collection
     */
    public function getUsersWithTasksAndRoles(): Collection
    {
        return $this->model->groupBy('tasks.user_id', 'users.id', 'users.name', 'users.email')
            ->join('tasks', 'users.id', '=', 'tasks.user_id')
            ->select(
                'users.id',
                'users.name',
                'users.email',
                DB::raw('SEC_TO_TIME( SUM( TIME_TO_SEC(tasks.time))) as spent_time'),
                DB::raw('Max(tasks.created_at) as last_task')
            )
            ->get()
            ->load('roles');
    }
}
