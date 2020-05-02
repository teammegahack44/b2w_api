<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ApiResponse;
use App\Presenters\UsuarioPresenter;
use App\Repositories\UsuarioRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{

    use ApiResponse;
    /**
     * @var UsuarioRepository
     */
    private $repository;
    /**
     * @var UsuarioPresenter
     */
    private $presenter;

    /**
     * UsuarioController constructor.
     * @param UsuarioRepository $repository
     * @param UsuarioPresenter $presenter
     */
    public function __construct(UsuarioRepository $repository, UsuarioPresenter $presenter)
    {
        $this->repository = $repository;
        $this->presenter = $presenter;
    }

    public function index()
    {
        $usuario = $this->repository->setPresenter($this->presenter)->findWhere(['id' => Auth::id()]);

        return $this->sendResponse($usuario);
    }

}
