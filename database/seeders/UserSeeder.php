<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;
use Carbon\Carbon;
//use DB;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $fake  = Factory::create();
        $limit = 1;

        //for ($i = 0; $i < $limit; $i++) {
        DB::table('users')->insert([
            'name' => 'Dương Nghĩa Hiệp',
            'avatar' => null,
            'email' => 'admin@gmail.com',
            'phone_number' => null,
            'password' => Hash::make('123456'),
            'dateOfBirth' => Carbon::now('Asia/Ho_Chi_Minh'),
            'email_verified_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'totalscore' => 0,
            'isAdmin' => true,
            'isManager' => false,
            //'token' => null,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'status' => true,
        ]);
        //}
        DB::table('users')->insert([
            'name' => 'Dương Nghĩa Hiệp',
            'avatar' => null,
            'email' => 'manager@gmail.com',
            'phone_number' => null,
            'password' => Hash::make('123456'),
            'dateOfBirth' => Carbon::now('Asia/Ho_Chi_Minh'),
            'email_verified_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'totalscore' => 0,
            'isAdmin' => false,
            'isManager' => true,
            //'token' => null,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'status' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'Dương Nghĩa Hiệp',
            'avatar' => null,
            'email' => 'user@gmail.com',
            'phone_number' => null,
            'password' => Hash::make('123456'),
            'dateOfBirth' => Carbon::now('Asia/Ho_Chi_Minh'),
            'email_verified_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'totalscore' => 0,
            'isAdmin' => false,
            'isManager' => false,
            //'token' => null,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'status' => true,
        ]);
    }
}