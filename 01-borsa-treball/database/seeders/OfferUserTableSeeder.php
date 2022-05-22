<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offer_user')->insert([

            [
                'offer_id' => '1',
                'user_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '2',
                'user_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '3',
                'user_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '4',
                'user_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '5',
                'user_id' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'offer_id' => '7',
                'user_id' => '6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
