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
        $question = 20;


        for ($i = 1; $i <= $question; $i++) {
            DB::table('questions')->insert([
                'questcontent' => $fake->sentence(15),
                'type_id' => 1,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                'updated_at' => null,
                'status' => 1,
            ]);
            $limit = 4;
            for ($j = 0; $j < $limit; $j++) {
                DB::table('answers')->insert([
                    'answercontent' => $fake->sentence(2),
                    'answerbool' => 1,
                    'question_id' => $i,
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
                    'updated_at' => null,
                    'status' => 1,
                ]);
            }
        }
    }
}