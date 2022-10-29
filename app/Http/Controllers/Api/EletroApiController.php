<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\eletrodomestico;
use Exception;
use Illuminate\Http\Request;

class EletroApiController extends Controller
{
    public function __construct(eletrodomestico $eletro, Request $request)
    {
        $this->eletro = $eletro;
        $this->request = $request;
    }
    public function index()
    {
        $data = eletrodomestico::select('eletrodomesticos.id','eletrodomesticos.nome', 'm.nome as marca', 'eletrodomesticos.tensao', 'eletrodomesticos.descricao')
            ->join('marcas as m', 'm.id', 'eletrodomesticos.marca_id')
            ->get();
        if(!$data) 
        {
            return response()->json(['alert' => 'Nada encontrado.']);
        }
        else 
        {
            return response()->json($data);
        }
       
    }

    public function store(Request $request)
    {
        $validator = $this->eletro->rules($request->all());

        if (!$validator->fails()) {
            $form = $request->all();
            try {
                $data = $this->eletro->create($form);
                return response()->json($data, 200);
            }
            catch (Exception $e) 
            {
                return response()->json(['error' => 'Falha ao inserir o registro. Verifique se existe a marca informada!']);
            }
        } else {
            return response()->json($validator->errors());
        }
        
    }

    public function show($id)
    {
        if(!$data = $this->eletro->find($id)) 
        {
            return response()->json(['error' => 'Nada encontrado.']);
        } 
        else 
        {
            return response()->json($data);
        }
    }

    public function update(Request $request, $id)
    {
        if(!$data = $this->eletro->find($id)) 
        {
            return response()->json(['error' => 'Nada encontrado.']);
        } 
        else 
        {
            $validator = $this->eletro->rules($request->all());
            if (!$validator->fails()) {
                $form = $request->all();
                $data->update($form);
                return response()->json($data, 200);
            } else {
                return response()->json($validator->errors());
            }
        }
    }

    public function destroy(Request $request)
    {
        if(!$data = $this->eletro->find($request->id)) 
        {
            return response()->json(['error' => 'Nada encontrado.']);
        } 
        else 
        {   
            $data->delete();
            return response()->json(['Success' => 'Registro deletado com sucesso.']);
        }
    }
}
