<?php

namespace App\Repositories;

use App\Type;
use App\Repositories\Contracts\TypeRepositoryInterface;

class TypeRepository extends AbstractRepository implements TypeRepositoryInterface
{
    /**
     * @var Type
     */
    protected $model;

    /**
     * @param Type $model
     */
    public function __construct(Type $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->model->all();
    }
}