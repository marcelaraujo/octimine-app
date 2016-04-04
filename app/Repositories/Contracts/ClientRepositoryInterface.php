<?php

namespace App\Repositories\Contracts;

interface ClientRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();
}