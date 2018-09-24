<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;
use LaraDex\Helper\DataViewer;

class Pokemon extends Model
{
    use DataViewer;

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
