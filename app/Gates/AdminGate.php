<?php
namespace App\Gates;
use Illuminate\Support\Facades\Gate;

class AdminGate{

    public function check_admin( $user)
    {
        Gate::define('isAdmin', function($user){
            if($user->email === 'admin1@gmail.com')
            {
                return true;
            }
            else
            {
                return false;
            }
        });
    }
}