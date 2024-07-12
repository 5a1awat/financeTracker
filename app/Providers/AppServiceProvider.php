<?php

namespace App\Providers;

use App\Repositories\AccountRepository;
use App\Repositories\AccountRepositoryInterface;
use App\Repositories\TransactionRepository;
use App\Repositories\TransactionsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(TransactionsRepositoryInterface::class, TransactionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
