<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',

            ],
            [

                'name.required' => 'Tên không được bỏ trống!',
                'email.required' => 'Email không được bỏ trống!',
                'email.email' => 'Email này không hợp lệ!',
                'email.unique' => 'Email này đã được sử dụng ở một tài khoản khác!',
                'password.required' => 'Mật khẩu không được bỏ trống!',

            ]
        );
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->toArray()], 400);
        } else {
            $data = $request->all();
            // dd($data);
            $acc = new User();
            $acc->name = $data['name'];
            $acc->email = $data['email'];
            $acc->password = Hash::make($data['password']);
            $acc->status = 1;
            $acc->isAdmin = 0;
            $acc->isManager = 0;
            $acc->dateOfBirth = null;
            $acc->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $acc->updated_at = null;
            $acc->save();
            return response()->json(['msg' => 'Successful account registration!'], 200);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Email không được bỏ trống!',
                'email.email' => 'Email này không hợp lệ!',
                'password.required' => 'Mật khẩu không được bỏ trống!',
            ]
        );

        $data = $request->all();

        $account = User::WHERE('email', $data['email'])->first();

        if (!empty($account)) {
            if (Hash::check($data['password'], $account->password)) {
                if ($account->status == 1) {
                    Auth::login($account);
                    $tokenResult = $account->createToken('Personal Access Token');
                    $token = $tokenResult->accessToken;
                    $token->created_at =  Carbon::now('Asia/Ho_Chi_Minh');
                    $token->last_used_at = Carbon::now('Asia/Ho_Chi_Minh')->addWeeks(1);
                    $token->save();
                    return response()->json([
                        'status' => 200,
                        'user' => [
                            'access_token' => $tokenResult->accessToken->token,
                            'id' => Auth::user()->id,
                            'avatar' => Auth::user()->avatar,
                            'name' => Auth::user()->name,
                            'email' => Auth::user()->email,
                            'password' => Auth::user()->password,
                            'phone_number' => Auth::user()->phone_number,
                            'date_of_birth' => Auth::user()->dateOfBirth,
                            'status' => Auth::user()->status,
                        ],
                    ]);
                } else {
                    return response()->json(['status' => 400, 'error' => 'Tài khoản bị khóa hoặc chưa kích hoạt.']);
                }
            } else {
                return response()->json(['status' => 400, 'error' => 'Mật khẩu không chính xác.']);
            }
        } else {
            return response()->json(['status' => 400, 'user' => 'Tài khoản này không tồn tại']);
        }
    }
}