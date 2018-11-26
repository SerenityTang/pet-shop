<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/11/22
 * Time: 下午5:43
 */

namespace App\Services\Mail;

use App\Mail\CommonMail;
use App\Models\EmailRecord;
use App\Models\User;
use Carbon\Carbon;
use Mail;

class CommonSendMail
{
    /**
     * 通用发送邮件方法
     *
     * @param User $user
     * @param $subject
     */
    public static function sendMail(User $user, $subject, $remarks)
    {
        $code = sha1($user->id . strtotime(Carbon::now()), false);  //邮件验证链接code
        $expire_time = date('Y-m-d H:i:s', strtotime('+' . config('global.email.expiration.time') . ' hour'));  //过期时间
        $url = url('/user/activate/email') . '/?code=' . $code;  //激活链接

        //向指定邮箱发送邮件
        Mail::to($user->email)->send(new CommonMail($user, $url, $subject));

        //生成发送邮件记录
        return EmailRecord::create([
            'user_id' => $user->id,
            'code' => $code,
            'url' => $url,
            'remarks' => $remarks,
            'expired_at' => $expire_time,
        ]);
    }
}