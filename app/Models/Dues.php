<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Dues extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;
    protected $table = "dues";

    protected $fillable = [
        "id",
        "declarante_cpf_cnpj",
        "declarante_razao_social",
        "identificacao",
        "numero",
        "moeda",
        "incoterm",
        "informacoes_complementares",
        "total_vmle_moeda",
        "total_vmcv_moeda",
        "total_peso_liquido",
    ];

    public function dueItens(): HasMany
    {
        return $this->hasMany(DueItens::class, 'due_id');
    }
}
