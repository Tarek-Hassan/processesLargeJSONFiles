<?php

namespace App\Services;


use App\Models\User;

use App\Models\Provider;

use App\Classes\Enums\ProviderTypes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Classes\ProviderStrategy\ProviderContext;

class UserService
{


    private function handelUserData($details)
    {
        $user=[
            'name'=>$details['user']['name'],
            'email'=>$details['user']['email'],
        ];
        return $user;

    }
    public function processUserData($details)
    {
        $user=$this->handelUserData($details);
         return User::firstOrCreate($user,['email']);
    }


}
