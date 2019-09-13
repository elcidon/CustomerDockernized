<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterApiController;
use App\Models\Documento;

class DocumentoApiController extends MasterApiController
{
    protected $model; 

    public function __construct(Documento $documento, Request $request) {
        $this->model   = $documento;
        $this->request = $request;
    }

    public function cliente($id) {
        if( !$data = $this->model->with('cliente')->find($id) ) 
            return response()->json(['error' => 'Nada encontrado']);

        return response()->json($data);
    }
}
