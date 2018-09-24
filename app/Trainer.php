<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;
use LaraDex\Helper\DataViewer; // Importo el helper

class Trainer extends Model
{
    /**
     * Le especifico al modelo que voy a usar un helper (DataViewer)
     */
    use DataViewer;

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
