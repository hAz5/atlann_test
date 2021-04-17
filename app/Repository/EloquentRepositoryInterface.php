<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface TaskRepositoryInterface
 *
 * @package App\Repository
 */
interface EloquentRepositoryInterface
{
    /**
     * @param array $attributes
     * @return Model
     */
    public function create(array $attributes): Model;

    /**
     * @param integer $id
     * @return Model
     */
    public function find($id): ?Model;
}
