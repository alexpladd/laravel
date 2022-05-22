<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([CompanyTableSeeder::class]);
        $this->call([StudyTableSeeder::class]);
        $this->call([UserTableSeeder::class]);
        $this->call([OfferTableSeeder::class]);
        $this->call([StudyUserTableSeeder::class]);
        //$this->call([OfferUserTableSeeder::class]);
        $this->call([OfferStudyTableSeeder::class]);

    }
}
