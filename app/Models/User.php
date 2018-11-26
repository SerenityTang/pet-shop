<?php

namespace App\Models;

use App\Models\Core\CoreUser;
use Illuminate\Notifications\Notifiable;

class User extends CoreUser
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'mobile', 'nick_name', 'avatar', 'realname', 'gender', 'birth', 'province', 'city', 'district', 'address', 'personal_domain', 'personal_website', 'personal_intro', 'qq_name', 'qq', 'wechat_name', 'wechat', 'wechat_qrcode', 'wechat_openid', 'wechat_unionid', 'weibo_name', 'weibo_link', 'github_name', 'github_link', 'profession_status', 'profession', 'applied_notifications', 'commented_notifications', 'attentioned_notifications', 'email_notifications', 'user_status', 'user_identity', 'approval_time', 'approval_status', 'email_verified', 'mobile_verified', 'expert_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'user_status' => 'boolean',
        'email_verified' => 'boolean',
        'mobile_verified' => 'boolean',
        'applied_notifications' => 'boolean',
        'commented_notifications' => 'boolean',
        'attentioned_notifications' => 'boolean',
        'email_notifications' => 'boolean',
    ];
}
