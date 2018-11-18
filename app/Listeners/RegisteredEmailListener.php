<?php

namespace App\Listeners;

use App\Mail\CommonMail;
use App\Models\EmailRecord;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class RegisteredEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $event->user;

        $code = sha1($user->id . strtotime(Carbon::now()), false);  //邮件验证链接code
        $expire_time = date('Y-m-d H:i:s', strtotime('+' . config('global.email.expiration.time') . ' hour'));  //过期时间
        $url = url('/activate_email') . '/?code=' . $code;  //激活链接

        //向指定邮箱发送邮件
        Mail::to($user->email)->send(new CommonMail($user));

        //生成发送邮件记录
        EmailRecord::create([
            'user_id' => $user->id,
            'code' => $code,
            'url' => $url,
            'remarks' => '注册 —— 激活个人账户',
            'expired_at' => $expire_time,
        ]);
    }
}
