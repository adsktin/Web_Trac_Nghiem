<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\Ranking;
use Laravel\Sanctum\PersonalAccessToken;
use DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AuthController extends Controller
{
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
                'name.required' => 'Họ và Tên không được bỏ trống!',
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

            $acc = new User();
            $acc->name = $data['name'];
            $acc->email = $data['email'];
            $acc->password = Hash::make($data['password']);
            $acc->dateOfBirth = null;
            $acc->totalscore = 0;

            $acc->status = 1;
            $acc->isAdmin = 0;
            $acc->isManager = 0;
            $acc->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $acc->updated_at = null;

            $acc->save();
            $files = Storage::files('app/public/assets/no-avatar.png');

            Storage::copy('assets/no-avatar.jpg', 'accounts/' . $acc->id . '/avatar/no-avatar.jpg');
            $file = Image::make(storage_path('app/public/assets/no-avatar.jpg'));
            $file->resize(360, 360, function ($constraint) {
                $constraint->aspectRatio();
            });
            $file->save(storage_path('app/public/accounts/' . $acc->id . '/avatar/no-avatar.jpg'));
            $acc->avatar = 'no-avatar.jpg';
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

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1, 'isAdmin' => 0, 'isManager' => 0])) {
            $user = User::where('email', $data['email'])->firstOrFail();

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
            ], 200);
        } else {
            return response()->json(['error' => 'Tài khoản này không tồn tại'], 400);
        }
    }
    public function getUser(Request $request)
    {
        // $ranking_single = DB::select('SELECT *,
        // DENSE_RANK() OVER (ORDER BY score_single DESC) dens_rank
        // FROM ranking;');

        // $ranking_challenge = DB::select('SELECT *,
        // DENSE_RANK() OVER (ORDER BY score_challenge DESC) dens_rank
        // FROM ranking;');
        // foreach ($ranking_single as $rank) {
        //     if ($rank->user_id == $request->user()->id) {
        //         $ranking_single = $rank->dens_rank;
        //     }
        // }
        // foreach ($ranking_challenge as $rank) {
        //     if ($rank->user_id == $request->user()->id) {
        //         $ranking_challenge = $rank->dens_rank;
        //     }
        // }
        return response()->json([
            'id' => $request->user()->id,
            'name' => $request->user()->name,
            'avatar' => URL('storage/account/' . $request->user()->id . '/avatar/' . $request->user()->avatar),
            'email' => $request->user()->email,
            'phone_number' => $request->user()->phone_number,
            'dateOfBirth' => date('d-m-Y', strtotime($request->user()->dateOfBirth)),
            'totalscore' => $request->user()->totalscore,
        ], 200);
    }
    public function changePassword(Request $request)
    {
        $data = $request->all();
        $user = $request->user();
        if (empty($user)) {
            return response()->json('Có lỗi xảy ra!', 400);
        } else {
            if (Hash::check($data['old_password'], $user->password)) {
                if ($data['new_password'] == $data['confirm_new_password']) {
                    $update = User::where('id', $user->id)->update(['password' => Hash::make($data['new_password']), 'updated_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
                }
            } else {
                return response()->json('Mật khẩu không khớp!', 400);
            }
            return response()->json(['message' => 'Đổi mật khẩu thành công!'], 200);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->token->delete();
        return response()->json(['message' => 'Đăng xuất thành công!'], 200);
    }
}