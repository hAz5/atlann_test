<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

interface TaskRepositoryInterface
{
    public function all(): Collection;

    public function userTasks(int $userId): Builder;
}
