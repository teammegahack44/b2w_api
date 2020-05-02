<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VideoChamadaRepository;
use App\Entities\VideoChamada;
use App\Validators\VideoChamadaValidator;

/**
 * Class VideoChamadaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VideoChamadaRepositoryEloquent extends BaseRepository implements VideoChamadaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VideoChamada::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
