<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Foto;

/**
 * Class FotoTransformer.
 *
 * @package namespace App\Transformers;
 */
class FotoTransformer extends TransformerAbstract
{
    /**
     * Transform the Foto entity.
     *
     * @param \App\Entities\Foto $model
     *
     * @return array
     */
    public function transform(Foto $model)
    {
        return [
            'id' => $model->id,
            'foto' => $model->foto,
        ];
    }
}
