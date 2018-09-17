<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    // Se debe especificar que campos se van a tomar para actulizarlos con el método fill() en
    // el controlador.
    protected $fillable = ['name', 'avatar', 'description'];

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
