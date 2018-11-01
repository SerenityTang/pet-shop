<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $mallNamespace = 'App\Http\Controllers\Mall';
    protected $adminNamespace = 'App\Http\Controllers\Admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $sld_prefix = explode('.', $_SERVER['HTTP_HOST'])[0];
        if (config('route.admin_url') == $sld_prefix) {
            $this->mapAdminRoutes();
        } elseif (config('route.home_url') == $sld_prefix) {
            $this->mapWebRoutes();
        } elseif (config('route.mall_url') == $sld_prefix) {
            $this->mapMallRoutes();
        } elseif (config('route.api_url') == $sld_prefix) {
            $this->mapApiRoutes();
        }
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "mall" routes for the application.
     *
     * These routes are typically imoop mall（慕宠商城）.
     *
     * @return void
     */
    protected function mapMallRoutes()
    {
        Route::middleware('web')
            ->namespace($this->mallNamespace)
            ->group(base_path('routes/web/mall.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically backstage management（后台管理）.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->adminNamespace)
            ->group(base_path('routes/web/admin.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
