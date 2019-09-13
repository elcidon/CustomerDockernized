<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Documento;

class Cliente extends Model
{
    protected $fillable = [
        "name",
        'telefone',
    ];

    public function rules() {
        return [
            'name'     => 'required', 
            'telefone' => 'required',
        ];
    }

    public function documento() {
        return $this->hasOne(Documento::class, 'cliente_id', 'id');
    }
}
