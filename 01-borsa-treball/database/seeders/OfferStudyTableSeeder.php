<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferStudyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offer_study')->insert([
            [
                'offer_id' => '1',
                'study_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '1',
                'study_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '2',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '3',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '4',
                'study_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '4',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '5',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '6',
                'study_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '6',
                'study_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '7',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '8',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '9',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '9',
                'study_id' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '10',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '10',
                'study_id' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '11',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '11',
                'study_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '12',
                'study_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '13',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '14',
                'study_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '14',
                'study_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '15',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '15',
                'study_id' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '16',
                'study_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '16',
                'study_id' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
