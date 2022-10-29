<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\marca;
use Illuminate\Http\Request;

class EletroMarcaApiController extends Controller
{
   
    public function index()
    {
        if($data = marca::select('id','nome')->get()) 
        {
            return response()->json(['alert' => 'Nada encontrado.']);
        }
        else 
        {
            return response()->json($data);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
