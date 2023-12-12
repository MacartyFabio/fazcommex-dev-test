<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class DueItens extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;

    protected $table = "due_itens";
    protected $fillable = [
        "id",
        "item",
        "due_id",
        "nfe_chave",
        "nfe_numero",
        "nfe_serie",
        "nfe_item",
        "descricao_complementar",
        "ncm",
        "vmle_moeda",
        "vmcv_moeda",
        "peso_liquido",
        "enquadramento1",
        "enquadramento2",
        "enquadramento3",
        "enquadramento4",
    ];

    public function dues(): BelongsTo
    {
        return $this->belongsTo(Dues::class);
    }
}
