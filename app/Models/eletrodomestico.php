<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Validator;

class eletrodomestico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'tensao',
        'marca_id'
    ];

    public function rules($data) {
        $validator = Validator::make($data, [
            'nome' => 'required',
            'descricao' => 'required|min:5',
            'tensao' => 'required',
            'marca_id' => 'required',
        ], $messages = [
            'nome.required' => 'De um nome ao eletrodoméstico.',
            'descricao.required' => 'A descrição precisa existir.',
            'descricao.min' => 'A descrição deverá conter ao menos 5 caracteres.',
            'tensao.required' => 'Selecione uma tenção elétrica.',
            'marca_id.required' => 'Selecione a marca.',
        ]);
        return $validator;
    }
}
