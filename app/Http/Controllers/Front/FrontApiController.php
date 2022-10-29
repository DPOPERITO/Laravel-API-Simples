<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\eletrodomestico;
use Illuminate\Http\Request;

class FrontApiController extends Controller
{
    public function getAllEletro () 
    {  
        $dados = eletrodomestico::select('eletrodomesticos.id','eletrodomesticos.nome', 'm.nome as marca', 'eletrodomesticos.tensao', 'eletrodomesticos.descricao')
            ->join('marcas as m', 'm.id', 'eletrodomesticos.marca_id')
            ->paginate(5);
        return view('frontend.index', ['dados' => $dados]);
    }
}
