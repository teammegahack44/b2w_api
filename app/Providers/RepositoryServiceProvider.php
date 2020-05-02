<?php

namespace App\Providers;

use App\Repositories\FotoRepository;
use App\Repositories\FotoRepositoryEloquent;
use App\Repositories\ProdutoRepository;
use App\Repositories\ProdutoRepositoryEloquent;
use App\Repositories\UsuarioRepository;
use App\Repositories\UsuarioRepositoryEloquent;
use App\Repositories\VideoChamadaRepository;
use App\Repositories\VideoChamadaRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            UsuarioRepository::class,
            UsuarioRepositoryEloquent::class);

        $this->app->bind(
            ProdutoRepository::class,
            ProdutoRepositoryEloquent::class);

        $this->app->bind(
            FotoRepository::class,
            FotoRepositoryEloquent::class);

        $this->app->bind(
            VideoChamadaRepository::class,
            VideoChamadaRepositoryEloquent::class);

    }

}
