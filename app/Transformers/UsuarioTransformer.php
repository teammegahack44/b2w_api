<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Usuario;

/**
 * Class UsuarioTransformer.
 *
 * @package namespace App\Transformers;
 */
class UsuarioTransformer extends TransformerAbstract
{
    /**
     * Transform the Usuario entity.
     *
     * @param \App\Entities\Usuario $model
     *
     * @return array
     */
    public function transform(Usuario $model)
    {
        return [
            'id' => $model->id,
            'nome' => $model->name,
            'email' => $model->email,
            'tipo' => $model->tipo,


        ];
    }
}
