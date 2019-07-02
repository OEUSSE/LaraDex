<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;
use LaraDex\Cliente;
use Auth;

class ClienteController extends Controller {

    /**
     * Método encargado de mostrar la vista de formulario
     * con los datos de todos los clientes actuales
     */
    public function Index() {
        $clients = Cliente::where('user_id', Auth::user()->id)->get();
        return view('client', compact('clients'));
    }
}
