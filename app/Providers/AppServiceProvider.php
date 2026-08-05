<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Follow;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
           view()->composer('components.sidebar', function ($view) {
            //ログインしてないときは何も渡さない。（エラー防止）
            if(!Auth::check()){
                return;
            }
        $user = Auth::user();

        $followCount = $user->followings()->count();
        $followerCount = $user->followers()->count();

        $view->with([
            'followCount' => $followCount,
            'followerCount' => $followerCount,
        ]);
    });
    }
}
