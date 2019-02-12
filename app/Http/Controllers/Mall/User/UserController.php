<?php

namespace App\Http\Controllers\Mall\User;

use App\Models\EmailRecord;
use App\Models\User;
use App\Services\Mail\CommonSendMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * 发送邮件
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmail(Request $request)
    {
        $subject = $request->input('subject');
        $remarks = $request->input('remarks');
        if (is_null($request->input('email')) && !is_null($request->input('username'))) {
            //登录界面
            $user = User::where('username', $request->input('username'))->first();
            $email_record = CommonSendMail::sendMail($user, $subject, $remarks);
        } else {
            //首页
            $email_record = CommonSendMail::sendMail(Auth::user(), $subject, $remarks);
        }

        if ($email_record) {
            return $this->jsonResult(200, '邮件发送成功，请前往邮箱验证！');
        } else {
            return $this->jsonResult(500, '邮件发送失败');
        }
    }

    /**
     * 激活邮件
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activateEmail(Request $request)
    {
        $email_record = EmailRecord::where('code', $request->input('code'))->first();
        if (!is_null($email_record)) {
            if (strtotime(Carbon::now()) > strtotime($email_record->expired_at)) {
                return $this->errorBadRequest('新用户注册账号激活链接已过期');
            } elseif ($email_record->status == true) {
                return $this->errorBadRequest('新用户注册账号激活链接已失效');
            } elseif ($email_record->status == false) {
                //更新邮箱发送记录信息
                $email_record->status = true;
                $email_record->activated_at = Carbon::now();
                if ($email_record->save()) {
                    //更新用户状态
                    $user = User::where('id', $email_record->user_id)->first();
                    $user->user_status = true;
                    $user->email_verified = true;
                    $user->save();

                    //激活账号并自动登录
                    Auth::guard()->login($user);

                    return $this->successOperation('恭喜您，新用户注册账号激活成功');
                }
            }
        } else {
            return $this->errorBadRequest('新用户注册账号激活链接不存在');
        }
    }
}
