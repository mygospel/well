<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FrenchLoginController extends Controller
{
    use AuthenticatesUsers;

    //protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = "/";

    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        //$this->middleware('guest:admin')->except('logout');
        //$this->middleware('guest:partner')->except('logout');
     }

    // 아래의 username을 추가하여 이메일 로그인에서 아이디 로그인으로 변경.
    public function username()
    {
        return 'p_id'; // 필드의 네임을 여러분의 선택.
    }



    public function partnerLogin(Request $request)
    {
        // 로그인은 여기를 바라보네...

        if (Auth::guard('partner')->attempt(['p_id' => $request->login_id, 'p_password' => $request->login_pw], $request->get('remember'))) {

            return redirect()->intended('/parner'); //요거는 계속 header 문제를 일으킴.
            //return redirect()->route('partnerhome'); //요거도 마찬가지네 그려.
        } 
        return back()->withInput($request->only('login_id', 'remember'));
    }

    public function logout(Request $request)
    {
        //Auth::guard("partner")->logout();
        Auth::guard('partner')->logout();
        
        if($request->ajax())
        {
            $result = [
                'result' => true];
            return response($result);
        }    
        return redirect('/partner/login');

    }
  
}