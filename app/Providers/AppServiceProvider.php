<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        view()->composer(
            'layouts.nav',
            function ($view) {
                $view->with('navigations', \App\Models\Navigation::with('roles')->with('children')->whereHas('roles', function ($query) {
                    $query->whereIn('RoleID', \Illuminate\Support\Facades\Auth::user()->load('roles')->roles->pluck('RoleID'));
                })->where('parent_id', null)->get());
            }
        );
    }
}
