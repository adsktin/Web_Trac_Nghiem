<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Validator;

use Session;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    // }

    public function login()
    {
        return view("admin.login");
    }

    public function checkLogin(Request $request)
    {

        $this->validate(
            $request,
            [
                'email' => 'required',
                'password' => 'required|alphaNum|min:6',
            ],
            // [
            //     'email.required' => 'Bạn chưa nhập email',
            //     'password.required' => 'Bạn chưa nhập mật khẩu',
            //     'password.min' => 'Mật khẩu không được nhỏ hơn 6 ký tự',
            // ]
        );
        //  && Auth::user()->isAdmin == 1
        $user_data = (['email' => $request->email, 'password' => $request->password, 'status' => 1]);
        if (Auth::attempt($user_data)) {
            //dd(Auth::check($user_data));
            //$request->session()->regenerate();
            return view('admin.pages.dashboard');
        }
        return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không chính xác');
    }
    public function logout(Request $request)
    {
        Auth::logout();

        //$request->session()->invalidate();

        //$request->session()->regenerateToken();

        return redirect()->route('login');
    }
}