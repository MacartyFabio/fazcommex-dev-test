<?php

namespace App\Presenters;

use App\Transformers\DueItensTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DueItensPresenter.
 *
 * @package namespace App\Presenters;
 */
class DueItensPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return DueItensTransformer
     */
    public function getTransformer(): DueItensTransformer
    {
        return new DueItensTransformer();
    }
}
