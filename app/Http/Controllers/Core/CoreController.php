<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CoreController extends Controller
{
    /**
     * 验证参数
     * @param $request
     * @param array $rules
     * @throws ApiException
     */
    public function commonValidate($request, array $rules, array $messages = [])
    {
        if (!is_array($request)) {
            $request = $request->all();
        }
        if (count($messages) == 0) {
            $validator = Validator::make($request, $rules);
        } else {
            $validator = Validator::make($request, $rules, $messages);
        }

        if ($validator->fails()) {
            return $validator->errors();
        }
    }
}
