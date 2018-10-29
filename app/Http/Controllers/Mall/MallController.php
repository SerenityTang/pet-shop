<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MallController extends Controller
{
    public function index()
    {
        return view('pc.malls.mall_home');
    }
}
