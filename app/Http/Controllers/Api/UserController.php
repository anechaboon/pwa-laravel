<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUser()
    {
        $user = User::get();
        $response['data'] = $user;
        $response['status'] = 200;
        return $response;
    }
}
