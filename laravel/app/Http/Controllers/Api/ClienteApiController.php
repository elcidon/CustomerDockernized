<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterApiController;

use App\Models\Cliente;

class ClienteApiController extends MasterApiController
{
    protected $model;
    protected $path = 'cliente'; 

    public function __construct(Cliente $clientes, Request $request) {
        $this->model   = $clientes;
        $this->request = $request;
    }

    public function documento($id) {
        if( !$data = $this->model->with('documento')->find($id) ) 
            return response()->json(['error' => 'Nada encontrado']);

        return response()->json($data);
    }

}
