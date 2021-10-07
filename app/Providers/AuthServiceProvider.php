<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Gates\AdminGate;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         //'App\Models\Post' => 'App\Policies\PostPolicy',
         //Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

       //gate authorization 
        // Gate::define('isAdmin', function($user){
        //     if($user->email === 'admin1@gmail.com')
        //     {
        //         return true;
        //     }
        //     else
        //     {
        //         return false;
        //     }
        // });

        //  Gate::define('isAdmin', [AdminGate::class, 'check_admin']);
    }
}
