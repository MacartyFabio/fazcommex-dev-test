<?php

namespace App\Presenters;

use App\Transformers\DuesTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DuesPresenter.
 *
 * @package namespace App\Presenters;
 */
class DuesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return DuesTransformer
     */
    public function getTransformer(): DuesTransformer
    {
        return new DuesTransformer();
    }
}
