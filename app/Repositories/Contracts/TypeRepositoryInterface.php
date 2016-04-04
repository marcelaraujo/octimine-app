<?php

namespace App\Repositories\Contracts;

interface TypeRepositoryInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findAll();
}