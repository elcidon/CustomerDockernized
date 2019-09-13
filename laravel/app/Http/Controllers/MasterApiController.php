<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Validator;


class MasterApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $data = $this->model->all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), $this->model->rules());

            // Se NÃO passar na validação...
            if( $validator->fails() ) 
                return response()->json($validator->messages(), 401);
            

            // Cria cliente
            $data = $request->all();

            $this->model->create($data);

            return response()->json($data, 200);
        } catch (\Throwable $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function show($id)
    {
        if (!$data = $this->model->find($id)) 
            return response()->json(["error" => "Não encontrado"], 404);

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {   
        try {
            $data = $this->model->find($id);

            if ( !$data ) 
                return response()->json(["error"=>"Não encontrado"], 404); 

            $validator = Validator::make($request->all(), $this->model->rules());

            // Se NÃO passar na validação...
            if( $validator->fails() ) 
                return response()->json($validator->messages(), 401);
            
            $data->update($request->all());

            return response()->json(["success" => "Alterado com sucesso!"], 200);
        } catch (\Throwable $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public function destroy($id)
    {
        if (!$data = $this->model->find($id)) 
            return response()->json(["error"=>"Não encontrado"], 404);

        $data->delete();
        return response()->json(["success" => "Excluido com sucesso!"], 200);
    }
}
