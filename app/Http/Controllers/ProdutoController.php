<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ApiResponse;
use App\Presenters\ProdutoPresenter;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    use ApiResponse;

    /**
     * @var ProdutoRepository
     */
    private $repository;
    /**
     * @var ProdutoPresenter
     */
    private $presenter;

    /**
     * ProdutoController constructor.
     * @param ProdutoRepository $repository
     * @param ProdutoPresenter $presenter
     */
    public function __construct(ProdutoRepository $repository, ProdutoPresenter $presenter)
    {
        $this->repository = $repository;
        $this->presenter = $presenter;
    }

    public function index(Request $request)
    {
        $produtos = $this->repository->setPresenter($this->presenter)->paginate();

        return $this->sendResponse($produtos);
    }

    public function get($id, Request $request)
    {

        $produtos = $this->repository->setPresenter($this->presenter)->findWhere(['id' => $id]);

        return $this->sendResponse($produtos);
    }

}
