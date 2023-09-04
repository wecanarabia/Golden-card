<?php

namespace App\Providers;

use App\Models\Service;
use App\Services\AuthService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        if(Request::getHost()=="goldencard.com.jo")
            Config::set('app.asset_alt','main/public/');

        view()->composer(
            'components.dash-layouts.sidebar', function ($view) {
                $view->with(['service'=> Service::find((app(AuthService::class)->service())),]);
            }
        );
    }
}
