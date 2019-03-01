<?php

namespace App\Http\Controllers\Mall\User;

use App\Http\Controllers\Core\CoreController;
use App\Repositories\Mall\User\UserRepository;

class UserController extends CoreController
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('pc.mall.user.index');
    }
}
