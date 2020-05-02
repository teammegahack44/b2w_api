<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\VideoChamada;

/**
 * Class VideoChamadaTransformer.
 *
 * @package namespace App\Transformers;
 */
class VideoChamadaTransformer extends TransformerAbstract
{
    /**
     * Transform the VideoChamada entity.
     *
     * @param \App\Entities\VideoChamada $model
     *
     * @return array
     */
    public function transform(VideoChamada $model)
    {
        return [
            'id' => $model->id,
        ];
    }
}
