<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Faker\Factory;
// use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Illuminate\Cache\RateLimiting\Limit;
//use DB;
use Illuminate\Support\Facades\DB;
use Nette\Utils\Random;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $fake->imageUrl(300, 300)
        $fake  = Factory::create();
        $list_image = ['1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png'];
        // admin acc
        DB::table('users')->insert([
            'name' => $fake->Name,
            'avatar' => '1.png',
            'email' => 'admin@gmail.com',
            'phone_number' => $fake->phoneNumber,
            'password' => Hash::make('123456'),
            'dateOfBirth' => $fake->date,
            'email_verified_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'totalscore' => 0,
            'isAdmin' => true,
            'isManager' => false,
            //'token' => null,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'status' => true,
        ]);
        // manager acc
        DB::table('users')->insert([
            'name' => $fake->Name,
            'avatar' => '1.png',
            'email' => 'manager@gmail.com',
            'phone_number' => $fake->phoneNumber,
            'password' => Hash::make('123456'),
            'dateOfBirth' => $fake->date,
            'email_verified_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'totalscore' => 0,
            'isAdmin' => false,
            'isManager' => true,
            //'token' => null,
            'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            'status' => true,
        ]);

        //user acc

        // DB::table('users')->insert([
        //     'name' => 'Dương Nghĩa Hiệp',
        //     'avatar' => null,
        //     'email' => 'user@gmail.com',
        //     'phone_number' => null,
        //     'password' => Hash::make('123456'),
        //     'dateOfBirth' => Carbon::now('Asia/Ho_Chi_Minh'),
        //     'email_verified_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        //     'totalscore' => 0,
        //     'isAdmin' => false,
        //     'isManager' => false,
        //     //'token' => null,
        //     'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        //     'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        //     'status' => true,
        // ]);
        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([
                'name' => $fake->Name,
                'avatar' => '1.png',
                'email' => $fake->unique->email,
                'phone_number' => $fake->phoneNumber,
                'password' => Hash::make('123456'),
                'dateOfBirth' => $fake->date,
                'email_verified_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'totalscore' => $fake->numberBetween(1, 999),
                'isAdmin' => false,
                'isManager' => false,
                //'token' => null,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'status' => true,
            ]);
        }
    }
}