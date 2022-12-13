<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class InfomationController extends Controller
{
    //
    public function infomation(Request $request)
    {
        return view('pages.account.infomation');
    }
    public function update(Request $request)
    {

        $this->validate(
            $request,
            [
                'name' => 'required',
                // 'password' => 'required',
                'phone_number' => 'required',
            ],
            [
                'name.required' => 'Tên không được bỏ trống!',
                // 'password.required' => 'Mật khẩu không được bỏ trống!',
                'phone_number.required' => 'Số điện thoại không được bỏ trống!',
            ]
        );

        $data = $request->all();
        $auth = Auth::user();
        $user =  User::find($auth->id);

        $user->name = $data['name'];
        $user->phone_number = $data['phone_number'];
        $user->status = true;
        $user->dateOfBirth = $data['dateOfBirth'];
        $user->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $Extentsion = $request->file('avatar')->getClientOriginalExtension();
            $fileName = time() . '.' . $Extentsion;
            $request->file('avatar')->storeAs('accounts/' . $user->id . '/avatar/', $fileName);
            $file = Image::make(storage_path('app/public/accounts/' . $user->id . '/avatar/' . $fileName));
            $file->resize(360, 360, function ($constraint) {
                $constraint->aspectRatio();
            });
            $file->save(storage_path('app/public/accounts/' . $user->id . '/avatar/' . $fileName));
            $user->avatar = $fileName;
        }
        $user->save();
        return redirect()->back()
            ->with('success', 'Cập nhật thông tin thành công!');
    }
}