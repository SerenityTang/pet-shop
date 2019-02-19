<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2019/2/18
 * Time: 下午10:56
 */

namespace App\Repositories;


use App\Models\User\User;
use App\Repositories\Core\CoreRepository;

class UserRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct(new User());
    }
}