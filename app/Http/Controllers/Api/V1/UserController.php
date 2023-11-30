<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Filters\User\IndexFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 120 );
        $users=User::filter(new IndexFilter(request()))->withCount('orders')->simplePaginate(30);
        return UserCollection::collection($users);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

}
