<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    public $table = 'pokemons';
    protected $fillable = ['name', 'image', 'clasification', 'weight', 'height', 'ranking', 'type'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
