<?php

namespace App\Repositories;

use App\Models\DueItens;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class DueItensRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DueItensRepositoryEloquent extends BaseRepository implements DueItensRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DueItens::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }


}
