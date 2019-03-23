<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Resources\PrivateUserResource;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function action(RegisterRequest $request)
    {
        $user = User::create($request->only('email', 'name', 'password'));

        return new PrivateUserResource($user);
    }
}
