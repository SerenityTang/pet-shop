<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2019/2/21
 * Time: 下午6:13
 */

namespace App\Traits;


trait JsonErrorTrait
{
    /**
     * 根据错误类型返回错误信息
     *
     * @param $code
     * @param $message
     */
    public function jsonError($code, $message)
    {
        abort($code, $message);
    }

    /**
     * 无法找到
     *
     * @param null $message
     */
    public function jsonErrorNotFound($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m404'));
        }

        $this->jsonError(404, $message);
    }

    /**
     * 参数错误
     *
     * @param null $message
     */
    public function jsonErrorBadRequest($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m400'));
        }
        $this->jsonError(400, $message);
    }

    /**
     * 禁止访问
     *
     * @param null $message
     */
    public function jsonErrorForbidden($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m403'));
        }
        $this->jsonError(403, $message);
    }

    /**
     * 服务器错误
     *
     * @param null $message
     */
    public function jsonErrorInternal($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m500'));
        }
        $this->jsonError(500, $message);
    }

    /**
     * 权限错误
     *
     * @param null $message
     */
    public function jsonErrorUnauthorized($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m401'));
        }
        $this->jsonError(401, $message);
    }

    /**
     * 不允许的方法
     *
     * @param null $message
     */
    public function jsonErrorMethodNotAllowed($message = null)
    {
        if (is_null($message)) {
            $message = __(config('error.m405'));
        }
        $this->jsonError(405, $message);
    }
}