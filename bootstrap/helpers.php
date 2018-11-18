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
    $url = \Illuminate\Support\Facades\URL::current();
    $delimiter1 = explode('//', $url);
    $delimiter2 = explode('.', $url);

    return str_replace($delimiter2[0], $delimiter1[0] . '//' . $type, $url);
}

/**
 * 通过邮箱类型获取邮箱服务商访问链接
 *
 * @param $email_type
 * @return string
 */
function email_facilitator($email_type)
{
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