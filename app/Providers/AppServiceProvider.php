<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
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
    public function boot(Request $request)
    {
        $path_array = $request->segments();
        $admin_route = config('app.admin_route');

        //http://127.0.0.1:8000/backend/anything
        if(in_array($admin_route , $path_array)){
            config(['app.app_scope'=>$admin_route]);
        }

        $app_scope = config('app.app_scope');

        if($app_scope == $admin_route){
            $path = resource_path($admin_route.'/views');
        }else{
            $path = resource_path('frontend/views');
        }
        view()->addLocation($path);
    }
}
