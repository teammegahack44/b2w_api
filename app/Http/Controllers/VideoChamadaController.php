<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ApiResponse;
use App\Presenters\VideoChamadaPresenter;
use App\Repositories\UsuarioRepository;
use App\Repositories\VideoChamadaRepository;
use Illuminate\Http\Request;

class VideoChamadaController extends Controller
{

    use ApiResponse;

    /**
     * @var VideoChamadaRepository
     */
    private $repository;
    /**
     * @var VideoChamadaPresenter
     */
    private $presenter;
    /**
     * @var UsuarioRepository
     */
    private $usuarioRepository;

    /**
     * VideoChamadaController constructor.
     * @param VideoChamadaRepository $repository
     * @param VideoChamadaPresenter $presenter
     * @param UsuarioRepository $usuarioRepository
     */
    public function __construct(VideoChamadaRepository $repository, VideoChamadaPresenter $presenter, UsuarioRepository $usuarioRepository)
    {
        $this->repository = $repository;
        $this->presenter = $presenter;
        $this->usuarioRepository = $usuarioRepository;
    }

    public function get($id)
    {

        $chamada = [];

        $chamada_u_1 = $this->repository->findWhere(['id_user_cliente' => $id])->first();
        $chamada_u_2 = $this->repository->findWhere(['id_user_vendedor' => $id])->first();

        if ($chamada_u_1 != null) {
            $chamada = $this->repository->setPresenter($this->presenter)->findWhere(['id' => $chamada_u_1->id]);
        } else if ($chamada_u_2 != null) {
            $chamada = $this->repository->setPresenter($this->presenter)->findWhere(['id' => $chamada_u_2->id]);
        }


        return $this->sendResponse($chamada);
    }

    public function create($id)
    {

        $vendedor = $this->usuarioRepository->findWhere(['tipo' => '1'])->first();

        $data = [
            'id_user_cliente' => $id,
            'id_user_vendedor' => $vendedor->id,
        ];

        try {
            if ($dados = $this->repository->create($data)) {
                return $this->sendResponse('Chamada registrada');
            }
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage());
        }

    }

    public function delete($id)
    {

        $chamada = [];

        $chamada_u_1 = $this->repository->findWhere(['id_user_cliente' => $id])->first();
        $chamada_u_2 = $this->repository->findWhere(['id_user_vendedor' => $id])->first();

        if ($chamada_u_1 != null) {
            $chamada = $this->repository->delete($chamada_u_1->id);
        } else if ($chamada_u_2 != null) {
            $chamada = $this->repository->delete($chamada_u_1->id);
        }

        if ($chamada) {
            return $this->sendResponse('Chamada finalizada');
        } else {
            return $this->sendResponse('Erro ao finalizar chamada');
        }
    }

}
