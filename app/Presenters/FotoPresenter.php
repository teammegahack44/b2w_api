<?php

namespace App\Presenters;

use App\Transformers\FotoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class FotoPresenter.
 *
 * @package namespace App\Presenters;
 */
class FotoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new FotoTransformer();
    }
}
