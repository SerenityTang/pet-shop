<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/11/21
 * Time: 上午8:06
 */

namespace App\Traits;

trait ErrorTrait
{
    /**
     * 根据错误类型返回错误页面
     *
     * @param $code
     * @param $message
     * @return \Illuminate\Http\Response
     */
    public function error($code, $message)
    {
        return response()->view('pc.errors.error', ['code' => $code, 'message' => $message]);
    }

    /**
     * 无法找到
     *
     * @param null $message
     */
    public function errorNotFound($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m404'));
        }

        return $this->error(404, $message);
    }

    /**
     * 参数错误
     *
     * @param null $message
     */
    public function errorBadRequest($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m400'));
        }
        return $this->error(400, $message);
    }

    /**
     * 禁止访问
     *
     * @param null $message
     */
    public function errorForbidden($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m403'));
        }
        return $this->error(403, $message);
    }

    /**
     * 服务器错误
     *
     * @param null $message
     */
    public function errorInternal($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m500'));
        }
        return $this->error(500, $message);
    }

    /**
     * 权限错误
     *
     * @param null $message
     */
    public function errorUnauthorized($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m401'));
        }
        return $this->error(401, $message);
    }

    /**
     * 不允许的方法
     *
     * @param null $message
     */
    public function errorMethodNotAllowed($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m405'));
        }
        return $this->error(405, $message);
    }
}