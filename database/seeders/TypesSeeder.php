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
        // $fake  = Factory::create();
        $limit = 7;
        $list_image = ['thethao.png', 'vutru.png', 'dialy.jpg', 'domeo.jpg', 'congnghe.jpg', 'amnhac.jpg', 'khoahoc.jpg'];
        $list_type = ['Thể Thao', 'Vũ Trụ', 'Địa Lý', 'Đố Mẹo', 'Công Nghệ', 'Âm Nhạc', 'Khoa Học'];
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