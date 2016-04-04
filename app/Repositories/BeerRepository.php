<?php

namespace App\Repositories;

use App\Beer;
use App\Repositories\Contracts\BeerRepositoryInterface;
use Illuminate\Support\Facades\DB;

class BeerRepository extends AbstractRepository implements BeerRepositoryInterface
{
    /**
     * @var Beer
     */
    protected $model;

    /**
     * @param Beer $model
     */
    public function __construct(Beer $model)
    {
        $this->model = $model;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll()
    {
        return $this->model->all()->sortBy('created_at');
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function paginate($perPage = 20, $columns = array('*'))
    {
        return $this->model->paginate($perPage, $columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->find($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}