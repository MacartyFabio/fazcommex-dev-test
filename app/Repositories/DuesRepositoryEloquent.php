<?php

namespace App\Repositories;

use App\Models\DueItens;
use App\Models\Dues;
use App\Presenters\DuesPresenter;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Validators\DuesValidator;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * Class DuesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DuesRepositoryEloquent extends BaseRepository implements DuesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Dues::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @throws RepositoryException
     */
    public function boot(): void
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function presenter(): string
    {
        return DuesPresenter::class;
    }

    public function save($data): void
    {
        $dues = new Dues([
            'moeda' => $data['moeda'],
            'numero' => $data['numero'],
            'incoterm' => $data['incoterm'],
            'identificacao' => $data['identificacao'],
            'declarante_cpf_cnpj' => $data['declarante_cpf_cnpj'],
            'declarante_razao_social' => $data['declarante_razao_social'],
            'informacoes_complementares' => $data['informacoes_complementares'],
        ]);

        if ($data['due_itens']) {
            $dues->total_vmle_moeda = $this->calculateTotal($data['due_itens'], 'vmle');
            $dues->total_vmcv_moeda = $this->calculateTotal($data['due_itens'], 'vmcv');
            $dues->total_peso_liquido = $this->calculateTotal($data['due_itens'], 'peso_liquido');
        }

        $dues->save();
        $this->saveItens($data['due_itens'], $dues->id);
    }

    private function calculateTotal($items, $field): string
    {
        return array_reduce($items, function ($carry, $item) use ($field) {
            return bcadd($carry, $item[$field], (Str::contains($field, 'peso_liquido') ? 5 : 2));
        }, '0');
    }

    private function saveItens(array $dueItens, int $duesId): void
    {
        foreach ($dueItens as $data) {
            $item = new DueItens([
                'item' => $data['item'],
                'due_id' => $duesId,
                'nfe_chave' => $data['nfe_chave'],
                'nfe_numero' => substr($data['nfe_chave'], 25, 9),
                'nfe_serie' => substr($data['nfe_chave'], 22, 3),
                'nfe_item' => $data['nfe_item'],
                'ncm' => $data['ncm'],
                'vmle_moeda' => $data['vmle'],
                'vmcv_moeda' => $data['vmcv'],
                'peso_liquido' => $data['peso_liquido'],
                'enquadramento1' => $data['enquadramento1'],
                'enquadramento2' => $data['enquadramento2'],
                'enquadramento3' => $data['enquadramento3'],
                'enquadramento4' => $data['enquadramento4'],
                'descricao_complementar' => $data['descricao_complementar']
            ]);
            $item->save();
        }
    }
}
