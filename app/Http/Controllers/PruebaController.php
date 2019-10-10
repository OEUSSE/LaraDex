<?php

namespace LaraDex\Http\Controllers;

# importaciones
use LaraDex\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PruebaController extends Controller {
  public function prueba(Request $request) {
    //event(new \LaraDex\Events\MessageTest($request->input('texto')));
  }
}
