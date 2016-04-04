<?php

namespace App\Repositories\Contracts;

use App\Beer;

interface BeerRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();

    public function findById($id);

    public function paginate($perPage = 20, $columns = array('*'));

    public function create(array $data);

    public function update($id, array $data);

    public function destroy($id);
}