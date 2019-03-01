<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2019/2/18
 * Time: 下午10:59
 */

namespace App\Repositories\Core;


use App\Traits\ErrorTrait;
use App\Traits\JsonErrorTrait;
use App\Traits\ResponseTrait;

class CoreRepository
{
    use ErrorTrait, ResponseTrait, JsonErrorTrait;

    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
}