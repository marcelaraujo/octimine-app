<?php

namespace App\Repositories;

abstract class AbstractRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->model, $method], $args);
    }
}