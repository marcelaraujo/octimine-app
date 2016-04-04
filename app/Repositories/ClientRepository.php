<?php

namespace App\Repositories;

use App\Client;
use App\Repositories\Contracts\ClientRepositoryInterface;

class ClientRepository extends AbstractRepository implements ClientRepositoryInterface
{
    /**
     * @var Client
     */
    protected $model;

    /**
     * @param Client $model
     */
    public function __construct(Client $model)
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