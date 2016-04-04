<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beers()
    {
        return $this->hasMany(Beer::class, 'type_id', 'id');
    }
}
