<?php

namespace LaraDex\Http\Controllers;

# importaciones
use LaraDex\Http\Controllers\Controller;

class PruebaController extends Controller {
  public function prueba($param) {
    return 'Hola desde PruebaController - Recibi este parámetro -> '.$param;
  }
}
