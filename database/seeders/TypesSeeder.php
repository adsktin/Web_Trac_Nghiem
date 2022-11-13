<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class TypesSeeder extends Seeder
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
        $limit = 9;
        $list_image = ['1668236183.png', '1668236194.jpg', '1668236206.jpg', '1668236241.jpg', '1668236276.gif', '1668236303.jpg', '1668236313.jpg', '1668237498.png', '1668237505.jpg'];
        $list_type = ['Thể Thao', 'Vũ Trụ', 'Địa Lý', 'Đố Mẹo', 'Công Nghệ', 'Âm Nhạc', 'Khoa Học', 'Thể Thao', 'Vũ Trụ'];
        for ($i = 0; $i < $limit; $i++) {
            DB::table('types')->insert([
                'image' => $list_image[$i],
                'type' => $list_type[$i],
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
    }
}