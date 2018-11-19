<?php

namespace App\Http\Controllers\User;

use App\Models\EmailRecord;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function activateEmail(Request $request)
    {
        $email_record = EmailRecord::where('code', $request->input('code'))->where('status', true)->first();
        if (!is_null($email_record)) {
            $email_record->status = false;
            $email_record->activated_at = Carbon::now();
            if ($email_record->save()) {
                $user = User::where('id', $email_record->user_id)->first();
                $user->user_status = true;
                $user->save();

                Auth::guard()->login($user);

                return redirect()->route('home');
            }
        } else {
            return response()->view('pc.errors.500', ['message' => '新用户注册账号激活链接失效或不存在']);
        }
    }
}
