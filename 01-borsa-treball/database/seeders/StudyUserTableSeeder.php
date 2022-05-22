<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_study')->insert([
            [

                'promotion_year' => '1997',
                'user_id' => '3',
                'study_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'promotion_year' => '1999',
                'user_id' => '4',
                'study_id' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'promotion_year' => '2001',
                'user_id' => '5',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'promotion_year' => '2001',
                'user_id' => '3',
                'study_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'promotion_year' => '2002',
                'user_id' => '4',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'promotion_year' => '2005',
                'user_id' => '4',
                'study_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'promotion_year' => '2003',
                'user_id' => '5',
                'study_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'promotion_year' => '2004',
                'user_id' => '6',
                'study_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'promotion_year' => '2005',
                'user_id' => '7',
                'study_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'promotion_year' => '2006',
                'user_id' => '7',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
