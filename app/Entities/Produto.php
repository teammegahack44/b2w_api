<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class ProdutoController.
 *
 * @package namespace App\Entities;
 */
class Produto extends Model
{

    protected $table = 'produto';

    public function foto()
    {
        return $this->hasMany(Foto::class, 'produto_id', 'id');
    }

}
