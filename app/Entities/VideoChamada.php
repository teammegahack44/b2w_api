<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class VideoChamada.
 *
 * @package namespace App\Entities;
 */
class VideoChamada extends Model
{

    protected $table = 'video_chamada';

    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_user_1', 'id_user_2'];

}
