<?php

namespace App\Http\Controllers;

use App\Traits\ErrorTrait;
use App\Traits\MailTrait;
use App\Traits\ResponseTrait;
use App\Traits\SuccessTrait;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, ResponseTrait, SuccessTrait, ErrorTrait, MailTrait;
}
