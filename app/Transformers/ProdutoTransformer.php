<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Produto;

/**
 * Class ProdutoTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProdutoTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['foto'];

    /**
     * Transform the ProdutoController entity.
     *
     * @param \App\Entities\Produto $model
     *
     * @return array
     */
    public function transform(Produto $model)
    {
        return [
            'id' => $model->id,
            'nome' => $model->nome,
            'valor' => $model->valor,
            'permite_chamada' => $model->permite_chamada,
            'descricao' => $model->descricao,

        ];
    }

    public function includeFoto(Produto $model)
    {
        return $this->collection($model->foto, new FotoTransformer(), false);
    }
}
