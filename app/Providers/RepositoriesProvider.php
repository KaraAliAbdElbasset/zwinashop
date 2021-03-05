<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoriesProvider extends ServiceProvider
{
    protected $repositories = [
        \App\Contracts\UserContract::class =>  \App\Repositories\UserRepository::class,
        \App\Contracts\AdminContract::class =>  \App\Repositories\AdminRepository::class,
        \App\Contracts\CategoryContract::class =>  \App\Repositories\CategoryRepository::class,
        \App\Contracts\BrandContract::class =>  \App\Repositories\BrandRepository::class,
        \App\Contracts\ProductContract::class =>  \App\Repositories\ProductRepository::class,
        \App\Contracts\OrderContract::class =>  \App\Repositories\OrderRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
