<?php

namespace App\Http\Controllers\Mall\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use function GuzzleHttp\Promise\all;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * 返回登录表单页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.common_login');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password', 'user_status');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = $this->validateLogin($request->all());
        if ($validator->fails()) {
            return $this->jsonResult(400, 'There are incorect values in the form!', $validator->errors());
        }

        $request->offsetSet('user_status', true);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $attempt_login = $this->attemptLogin($request);
        if ($attempt_login) {
            return $this->sendLoginResponse($request);
        } else {
            $result = User::where($this->username(), $request->all()[$this->username()])->first();
            if (!is_null($result)) {
                if ($result->user_status == false) {
                    return $this->jsonResult('m400', 'There are incorect values in the form!',  '登录账号未激活，请<a href="{{ email_facilitator() }}" class="go-email">
                前往邮箱</a> 验证 或 重新 <a href="javascript:void(0)" class="again-send">发送邮件</a> 进行账号激活！');
                } else {
                    return $this->jsonResult('m400', 'There are incorect values in the form!', '用户名或密码不正确');
                }
            }
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    protected function validateLogin(array $data)
    {
        return Validator::make($data, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }
}
