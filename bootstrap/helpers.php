<?php

/**
 * 路由名称作为页面样式名称前缀
 *
 * @return mixed
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

/**
 * 路径
 *
 * @param $type
 * @return mixed
 */
function sld_prefix($type)
{
    $url = \Illuminate\Support\Facades\URL::current();      //当前完整路径
    $delimiter1 = explode('//', $url);
    $delimiter2 = explode('/', $delimiter1[1]);
    $delimiter3 = explode('.', $url);
    $domain = $delimiter1[0] . '//' . $delimiter2[0];       //去除 '/'后面部分

    return str_replace($delimiter3[0], $delimiter1[0] . '//' . $type, $domain);
}

/**
 * 通过邮箱类型获取邮箱服务商访问链接
 *
 * @param $email_type
 * @return string
 */
function email_facilitator($email = null)
{
    if (is_null($email) && \Illuminate\Support\Facades\Auth::check()) {
        $email = \Illuminate\Support\Facades\Auth::user()->email;
    }
    $email_type = explode('.', explode('@', $email)[1])[0];
    switch ($email_type) {
        case 'qq':
            $email_url = 'https://mail.qq.com';
            break;
        case '163':
            $email_url = 'https://mail.163.com';
            break;
        case '126':
            $email_url = 'https://www.126.com';
            break;
        case 'sina':
            $email_url = 'https://mail.sina.com.cn';
            break;
        case 'gmail':
            $email_url = 'https://mail.google.com';
            break;
        case 'aliyun':
            $email_url = 'https://mail.aliyun.com';
            break;
        case 'yahoo':
            $email_url = 'https://login.yahoo.com';
            break;
        case 'outlook':
            $email_url = 'https://login.live.com';
            break;
        default:
            $email_url = '';
            break;
    }

    return $email_url;
}

/**
 * 返回邮箱认证状态
 *
 * @return bool
 */
function getEmailStatus()
{
    if (\Illuminate\Support\Facades\Auth::check()) {
        return \Illuminate\Support\Facades\Auth::user()->email_verified;
    } else {
        return true;
    }
}