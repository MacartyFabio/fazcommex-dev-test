<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\DueItens;

/**
 * Class DueItensTransformer.
 *
 * @package namespace App\Transformers;
 */
class DueItensTransformer extends TransformerAbstract
{
    /**
     * Transform the DueItens entity.
     *
     * @param \App\Models\DueItens $model
     *
     * @return array
     */
    public function transform(DueItens $model)
    {
        return [
            "id"                     => $model->id,
            "item"                   => $model->item,
            "nfe_chave"              => $model->nfe_chave,
            "nfe_numero"             => $model->nfe_numero,
            "nfe_serie"              => $model->nfe_serie,
            "nfe_item"               => $model->nfe_item,
            "descricao_complementar" => $model->descricao_complementar,
            "ncm"                    => $model->ncm,
            "vmle_moeda"             => $model->vmle_moeda,
            "vmcv_moeda"             => $model->vmcv_moeda,
            "peso_liquido"           => $model->peso_liquido,
            "enquadramento1"         => $model->enquadramento1,
            "enquadramento2"         => $model->enquadramento2,
            "enquadramento3"         => $model->enquadramento3,
            "enquadramento4"         => $model->enquadramento4,
        ];
    }
}
