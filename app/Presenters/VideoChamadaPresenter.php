<?php

namespace App\Presenters;

use App\Transformers\VideoChamadaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VideoChamadaPresenter.
 *
 * @package namespace App\Presenters;
 */
class VideoChamadaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VideoChamadaTransformer();
    }
}
