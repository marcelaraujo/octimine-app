<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['full_name', 'email'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function beers()
    {
        return $this->hasMany(Beer::class, 'client_id', 'id');
    }
}
