<?php

namespace App\Http\Controllers;

use Crm\User\Requests\CreateUserRequest;
use Crm\User\Services\UserService;

class UserController extends Controller
{
    const TOKEN_NAME = 'personal';

    public function __construct(
        private UserService $userService
    ){}

    public function create(CreateUserRequest $request)
    {
        $user = $this->userService->create($request);
        return response()->json(
            [
                'user' => $user,
                'token' => $user->createToken(self::TOKEN_NAME)->plainTextToken
            ]

        );
    }
}
