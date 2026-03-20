<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Throwable;

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
        Paginator::useBootstrapFive();

        View::composer('*', function ($view): void {
            $loaiTinMenu = collect();

            try {
                if (Schema::hasTable('loaitin')) {
                    $loaiTinMenu = DB::table('loaitin')
                        ->select('id', 'tenLoai', 'slug')
                        ->where('anHien', 1)
                        ->orderBy('thuTu')
                        ->orderBy('id')
                        ->limit(10)
                        ->get();
                }
            } catch (Throwable) {
                $loaiTinMenu = collect();
            }

            $view->with('loaiTinMenu', $loaiTinMenu instanceof Collection ? $loaiTinMenu : collect());
        });
    }
}
