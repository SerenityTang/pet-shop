<?php

namespace App\Http\Controllers\Mall;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * 用户收货地址列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        /*if (Auth::check()) {
            $userId = Auth::user()->id;
            $userAddress = UserAddress::where('user_id', $userId)->get();
            return view('pc.mall.user.user_address', ['userAddress' => $userAddress]);
        }*/
        if (Auth::check()) {
            $userAddress = Auth::user()->userAddress;
            return view('pc.mall.user.user_address', ['userAddress' => $userAddress]);
        }
    }
}
