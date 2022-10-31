<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\eletrodomestico;
use Illuminate\Http\Request;

class FrontApiController extends Controller
{   
    public function searchEletro (Request $request) 
    {
        !empty($request['_nome']) ? $nome = $request['_nome'] : $nome = null;
        !empty($request['_tensao']) ? $tensao = $request['_tensao'] : $tensao = null;
        !empty($request['_marca']) ? $marca = $request['_marca'] : $marca = null;

        $url = "http://localhost/apiLaravel/public/api/eletro/show?nome=".$nome."&marca=".$marca."&tensao=".$tensao;
        $crl = curl_init($url);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        $eletro = json_decode(curl_exec($crl)); 
        curl_close($crl);

        $url2 = "http://localhost/apiLaravel/public/api/eletro/marca";
        $crl2 = curl_init($url2);
        curl_setopt($crl2, CURLOPT_RETURNTRANSFER, true);
        $marca = json_decode(curl_exec($crl2));
        
        curl_close($crl2);

        return view('frontend.index', ['eletro' => $eletro, 'marcas' => $marca]);
    }
    public function getAllEletro () 
    {  
        $url = "http://localhost/apiLaravel/public/api/eletro";
        $crl = curl_init($url);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, true);
        $eletro= json_decode(curl_exec($crl));
        
        curl_close($crl);
        
        $url2 = "http://localhost/apiLaravel/public/api/eletro/marca";
        $crl2 = curl_init($url2);
        curl_setopt($crl2, CURLOPT_RETURNTRANSFER, true);
        $marca = json_decode(curl_exec($crl2));
        
        curl_close($crl2);
        return view('frontend.index', ['eletro' => $eletro, 'marcas' => $marca]);
    }
}
