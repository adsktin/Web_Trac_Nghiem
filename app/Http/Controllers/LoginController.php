<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//use Validator;

use function PHPUnit\Framework\isEmpty;

class LoginController extends Controller
{
    //
    public function formlogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {

        print_r($request->all());
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|alphaNum|min:6',
            ],
            [
                'email.email' => 'Tên đăng nhập phải là email',
                'email.required' => 'Bạn chưa nhập email',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự',

            ]
        );

        $user_data = (['email' => $request->email, 'password' => $request->password, 'status' => true]);
        if (Auth::attempt($user_data)) {
            return redirect()->route('dashboard');
        }
        return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không chính xác');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login');
    }
}