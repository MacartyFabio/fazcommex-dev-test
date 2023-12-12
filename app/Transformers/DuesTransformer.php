<?php

namespace App\Transformers;

use App\Models\Dues;
use League\Fractal\TransformerAbstract;

/**
 * Class DuesTransformer.
 *
 * @package namespace App\Transformers;
 */
class DuesTransformer extends TransformerAbstract
{

    protected array $defaultIncludes = [
        'itens',
    ];
    /**
     * Transform the Dues entity.
     *
     * @param \App\Models\Dues $model
     *
     * @return array
     */
    public function transform(Dues $model): array
    {
        return [
            "id"                         => $model->id,
            "declarante_cpf_cnpj"        => $model->declarante_cpf_cnpj,
            "declarante_razao_social"    => $model->declarante_razao_social,
            "identificacao"              => $model->identificacao,
            "numero"                     => $model->numero,
            "moeda"                      => $model->moeda,
            "incoterm"                   => $model->incoterm,
            "informacoes_complementares" => $model->informacoes_complementares,
            "total_vmle_moeda"           => $model->total_vmle_moeda,
            "total_vmcv_moeda"           => $model->total_vmcv_moeda,
            "total_peso_liquido"         => $model->total_peso_liquido,
        ];
    }

    public function includeItens(Dues $model): \League\Fractal\Resource\Collection
    {
        $itens = $model->dueItens;

        return $this->collection(collect($itens),new DueItensTransformer());
    }
}
