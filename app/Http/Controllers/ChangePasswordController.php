<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ChangePasswordController extends Controller
{
    //
   



    public function ChangePassword(Request $request)
    {
        return view('pages.account.change-password');
    }

    public function ChangePasswordSave(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string',
            'new_password' => 'required|confirmed|min:6|string',
            'new_password_confirmation' => 'required|min:6|string',
        ], [
            'current_password.required' => 'Mật khẩu cũ không được bỏ trống!',
            'new_password.required' => 'Mật khẩu mới không được bỏ trống!',
            'new_password.confirmed' => 'Mật khẩu mới khác xác nhận mận khẩu mới!',
            'new_password.min' => 'Xác nhận mật khẩu mới phải ít nhất 6 kí tự!',
            'new_password_confirmation.required' => 'Mật khẩu mới không được bỏ trống!',
            'new_password_confirmation.min' => 'Xác nhận mật khẩu mới phải ít nhất 6 kí tự!',
        ]);
        $auth = Auth::user();

        // The passwords matches
        if (!Hash::check($request->get('current_password'), $auth->password)) {
            return back()->with('error', "Mật khẫu cũ không giống mật khẩu của bạn!");
        }

        // Current password and new password same
        if (strcmp($request->get('current_password'), $request->new_password) == 0) {
            return redirect()->back()->with("error", "Mật khẩu mới không được giống mật khẫu cũ!");
        }

        $user =  User::find($auth->id);
        $user->password =  Hash::make($request->new_password);
        $user->save();
        return back()->with('success', "Đổi mật khẩu thành công");
    }
}
