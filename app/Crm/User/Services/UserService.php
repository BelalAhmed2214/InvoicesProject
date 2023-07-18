<?php

namespace Crm\User\Services;

use Crm\User\Events\UserCreation;
use Crm\User\Models\User;
use Crm\User\Requests\CreateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserService
{
    public function create(CreateUserRequest $request): ?User
    {
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();
        event(new UserCreation($user));
        return $user;
    }
}
