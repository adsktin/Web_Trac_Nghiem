<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;
use Carbon\Carbon;

class QuestionSeeder extends Seeder
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
        $list_question = [
            '',
            'Amir Khan đã giành được huy chương quyền anh Olympic của mình vào năm nào?',
            'Bóng nước được tạo ra khi nào?',
            'Quyền anh trở thành môn thể thao hợp pháp vào năm nào?',
            'Trung tâm bowling lớn nhất nằm ở đâu?',
            'Thuật ngữ “bida” bắt nguồn từ đâu?',
            'Quốc gia nào có nhiều huy chương vàng Olympic môn bơi lội nhất?',
            'Quốc gia nào vô địch World Cup 2018?',
            'Môn thể thao nào được coi là “môn thể thao vua”?',
            'Cuộc đua ma ra tông kéo dài bao lâu?',
            'rong tất cả các môn thể thao đối kháng dưới đây, môn thể thao nào Lý Tiểu Long không luyện tập?',
            'Có bao nhiêu cầu thủ trong một đội futsal (bóng đá trong nhà)?',
        ];
        $list_answer1 = [
            '2004', '1999', '2002', '1998',
        ];
        $list_answer2 = [
            'Thế kỷ 19', 'Thế kỷ 18', 'Thế kỷ 20', 'Thế kỷ 17',

        ];
        $list_answer3 = [
            '1901', '1911', '1931', '1921',

        ];
        $list_answer4 = [
            'Nhật Bản', 'Mỹ', 'Phần Lan', 'Singapore',

        ];
        $list_answer5 = [
            'Pháp',  'Ý', 'Bỉ', 'Đức',

        ];
        $list_answer6 = [
            'Canada', 'Mỹ', 'Anh', 'Pháp',

        ];
        $list_answer7 = [
            'Pháp',  'Anh', 'Bỉ', 'Croatia',

        ];
        $list_answer8 = [
            'Bóng đá', 'Quần vợt', 'Bóng chày', 'Bóng rổ',

        ];
        $list_answer9 = [
            '42,195 km', '45 km', '23 km', '44km',

        ];
        $list_answer10 = [
            'Wushu',  'Quyền anh', 'Kiếm thuật', 'Triệt Quyên đạo',

        ];
        $list_answer11 = [
            '5', '4', '6', '7',
        ];
        // $question = 11;
        // for ($i = 1; $i <= $question; $i++) {
        //     // for ($j = 0; $j <= $typequest; $j++) {
        //     DB::table('questions')->insert([
        //         // 'questcontent' => $fake->sentence(15),
        //         'questcontent' =>  $list_question[$i],
        //         'type_id' => 1,
        //         // 'type_id' => $j,
        //         'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        //         'updated_at' => null,
        //         'status' => 1,
        //     ]);
        //     // }
        //     // $answers = collect([0, 0, 0, 1])->shuffle();
        //     $answers = [1, 0, 0, 0];
        //     $limit = 4;
        //     for ($j = 0; $j < $limit; $j++) {
        //         DB::table('answers')->insert([
        //             // 'answercontent' => $fake->sentence(2),
        //             'answercontent' => $list_answer[$i],
        //             'answerbool' => $answers[$j],
        //             'question_id' => $i,
        //             'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
        //             'updated_at' => null,
        //             'status' => 1,
        //         ]);
        //         // shuffle($answers);
        //     }
        // }

        //
        $question = 11;
        for ($i = 1; $i <= $question; $i++) {
            DB::table('questions')->insert([
                'questcontent' =>  $list_question[$i],
                'type_id' => 1,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        $answers = [1, 0, 0, 0];
        $limit = 4;
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer1[$j],
                'answerbool' => $answers[$j],
                'question_id' => 1,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer2[$j],
                'answerbool' => $answers[$j],
                'question_id' => 2,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer3[$j],
                'answerbool' => $answers[$j],
                'question_id' => 3,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer4[$j],
                'answerbool' => $answers[$j],
                'question_id' => 4,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer5[$j],
                'answerbool' => $answers[$j],
                'question_id' => 5,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer6[$j],
                'answerbool' => $answers[$j],
                'question_id' => 6,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer7[$j],
                'answerbool' => $answers[$j],
                'question_id' => 7,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer8[$j],
                'answerbool' => $answers[$j],
                'question_id' => 8,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer9[$j],
                'answerbool' => $answers[$j],
                'question_id' => 9,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer10[$j],
                'answerbool' => $answers[$j],
                'question_id' => 10,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
        for ($j = 0; $j < $limit; $j++) {
            DB::table('answers')->insert([
                'answercontent' => $list_answer11[$j],
                'answerbool' => $answers[$j],
                'question_id' => 11,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
        }
    }
}