<?php
/**
 * Created by PhpStorm.
 * User: Serenity_Tang
 * Date: 2018/11/13
 * Time: 上午11:53
 */

namespace App\Traits;


trait ResponseTrait
{
    /**
     * json 格式返回结果
     *
     * @param $code
     * @param null $message
     * @param null $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function jsonResult($code, $message = null, $data = null)
    {
        $message = empty($message) ? config('error.' . $code) : $message;
        $resultCon = ['code' => $code, 'message' => $message];
        if (empty($data) === false) {
            $resultCon['data'] = $data;
        }

        return response()->json($resultCon);
    }
}