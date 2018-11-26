<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/11/22
 * Time: 下午3:46
 */

namespace App\Traits;

trait SuccessTrait
{
    /**
     * 根据错误类型返回错误页面
     *
     * @param $code
     * @param $message
     * @return \Illuminate\Http\Response
     */
    public function success($code, $message)
    {
        return response()->view('pc.success.success', ['code' => $code, 'message' => $message]);
    }

    /**
     * 操作成功
     *
     * @param null $message
     */
    public function successOperation($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m200'));
        }

        return $this->success(200, $message);
    }
}