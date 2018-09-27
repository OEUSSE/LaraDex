<?php

// Indico de donde otros archivos podrán acceder al Trait
namespace LaraDex\Helper;
/**
 * ¿Qué es un trait?
 * http://php.net/manual/es/language.oop5.traits.php
 * 
 */
trait DataViewer {
    
    /**
     * La forma de acceder a éste método en el Controlador, es algo diferente.
     * Se podría pensar que la forma de accerder a el sería llamando al modelo y
     * el método asi:
     * 
     * Trainer::scopeSearchPaginateAndOrder();
     * 
     * Pero no es así:
     * La forma correcta de llamarlo, sería asi:
     * Trainer::searchPaginateAndOrder();
     * 
     * Se omite la palabra "scope" y se comienza el resto del método en camelCase
     * 
     */

    public function scopeSearchPaginateAndOrder($query)
    {
        // Le espeficico al query, que me traiga los primeros 20 resultados
        return $query->paginate(25);
    }

    // Creo una array con los campos que deseo mostrar en el DataViewer Trainers
    public static $trainer_columns = [
        'id', 'name', 'description',
        'created_at', 'updated_at'
    ];

    public static $pokemon_columns = [
        'id', 'name', 'clasification', 'weight',
        'height', 'ranking', 'type', 'created_at', 'updated_at'
    ];
}
