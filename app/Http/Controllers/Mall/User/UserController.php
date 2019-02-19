<?php

namespace App\Http\Controllers\Mall\User;

use App\Http\Controllers\Core\CoreController;
use App\Repositories\UserRepository;

class UserController extends CoreController
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {

    }
}
