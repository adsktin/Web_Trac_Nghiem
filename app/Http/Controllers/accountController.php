<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
//use Image;
//use Intervention\Image\Facades\Image as Image;
use Intervention\Image\Facades\Image;
use Image as InterventionImage;
//use App\Image;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\json_encode;

class AccountController extends Controller
{
    //
    public function showaccount()
    {
        $i = 0;
        $users = User::all();
        return  view('pages.account.showaccount', compact('i', 'users'));
    }

    public function showcreate()
    {
        return  view('pages.account.create-account');
    }
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'confirm_password' => 'required',
                'phone_number' => 'required',

            ],
            [
                'name.required' => 'Tên không được bỏ trống!',
                'email.required' => 'Email không được bỏ trống!',
                'email.email' => 'Email này không hợp lệ!',
                'email.unique' => 'Email này đã được sử dụng ở một tài khoản khác!',
                'password.required' => 'Mật khẩu không được bỏ trống!',
                'confirm_password.required' => 'Xác nhận mật khẩu không được bỏ trống!',
                'phone_number.required' => 'Số điện thoại không được bỏ trống!',

            ]
        );
        $data = $request->all();
        $acc = new User();
        $acc->name = $data['name'];
        $acc->email = $data['email'];
        $acc->phone_number = $data['phone_number'];
        if ($data['password'] == $data['confirm_password']) {
            $acc->password = Hash::make($data['password']);
        } else {
            return redirect()->route('showcreate-account')->with(['error_password' => 'Mật khẩu và xác nhận mật khẩu không giống nhau!']);
        }

        if ($data['position'] == 'admin') {
            $acc->isAdmin = true;
            $acc->isManager = false;
        } elseif ($data['position'] == 'manager') {
            $acc->isAdmin = false;
            $acc->isManager = true;
        }
        $acc->totalscore = 0;
        $acc->status = true;
        //$acc->dateOfBirth = $data['date_of_birth'];
        $acc->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $acc->updated_at = null;



        $acc->save();
        if ($request->hasFile('avatar')) {

            $file = $request->file('avatar');
            $Extentsion = $request->file('avatar')->getClientOriginalExtension();
            $fileName = time() . '.' . $Extentsion;
            $request->file('avatar')->storeAs('accounts/' . $acc->id . '/avatar/', $fileName);
            $file = Image::make(storage_path('app/public/accounts/' . $acc->id . '/avatar/' . $fileName));
            $file->resize(360, 360, function ($constraint) {
                $constraint->aspectRatio();
            });
            $file->save(storage_path('app/public/accounts/' . $acc->id . '/avatar/' . $fileName));
            $acc->avatar = $fileName;
        }

        $acc->save();
        return redirect()->route('showcreate-account')->with('success', 'Thêm tài khoản thành công!');
    }


    public function edit($id)
    {
        $user = User::find($id);
        return view('pages.account.edit-account', compact('user'));
    }
    public function update(Request $request)
    {

        $this->validate(
            $request,
            [
                'name' => 'required',
                'password' => 'required',
                'phone_number' => 'required',
            ],
            [
                'name.required' => 'Tên không được bỏ trống!',
                'password.required' => 'Mật khẩu không được bỏ trống!',
                'phone_number.required' => 'Số điện thoại không được bỏ trống!',
            ]
        );

        $data = $request->all();
        $acc = User::WHERE('id', $request->id)->first();

        if (!empty($acc)) {
            $acc->name = $data['name'];
            $acc->phone_number = $data['phone_number'];
            $acc->password = Hash::make($data['password']);
            if ($data['position'] == 'admin') {
                $acc->isAdmin = true;
                $acc->isManager = false;
            } elseif ($data['position'] == 'manager') {
                $acc->isAdmin = false;
                $acc->isManager = true;
            }
            $acc->status = true;
            $acc->dateOfBirth = $data['dateOfBirth'];
            //$acc->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $acc->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

            if ($request->hasFile('avatar')) {

                $file = $request->file('avatar');
                $Extentsion = $request->file('avatar')->getClientOriginalExtension();
                $fileName = time() . '.' . $Extentsion;
                $request->file('avatar')->storeAs('accounts/' . $acc->id . '/avatar/', $fileName);
                $file = Image::make(storage_path('app/public/accounts/' . $acc->id . '/avatar/' . $fileName));
                $file->resize(360, 360, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $file->save(storage_path('app/public/accounts/' . $acc->id . '/avatar/' . $fileName));
                $acc->avatar = $fileName;
            }
            $acc->save();
            return redirect()->back()
                ->with('success', 'Cập nhật thành công!');
        }
    }

    public function delete(Request $request)
    {
        User::find($request->id)->delete();
        return redirect()->route('show-account')->with('success_delete', 'Xóa tài khoản thành công thành công!');
    }

    public function changestatus(Request $request)
    {
        $acc = User::WHERE('id', $request->id)->first();
        $acc->status = !$request->status;

        $acc->save();

        if ($acc->status == false) {
            return redirect()->route('show-account')->with('success_lock', 'Khóa tài khoản thành công thành công!');
        } else {
            return redirect()->route('show-account')->with('success_unlock', 'Hủy khóa tài khoản thành công thành công!');
        }
    }
}