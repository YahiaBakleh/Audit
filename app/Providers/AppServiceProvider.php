<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Section;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view) {

            if (!Cache::has('site_settings')) {
                $settings = Cache::rememberForever('site_settings', function () {
                    $settings = Setting::rows();
                    return $settings;
                });
            } else {
                $settings = Cache::get('site_settings');
            }
            return [
                $view->with('settings', $settings),
            ];
        });
       
        $careers = Section::where('type' , 3)->where('parent_id' ,null)->get();
        $press = Section::where('type' , 2)->where('parent_id' ,null)->get();
        $article = Section::where('type' , 5)->where('parent_id' ,null)->get();
        $services = Section::where('type' , 1)->where('parent_id' , null)->get();

        $data = array('careers'=> $careers  , 'press' => $press , 'article' => $article , 'services' => $services);


        View::share('data', $data) ;
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
