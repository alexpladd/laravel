<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Alex',
                'last_name' => 'Abargues',
                'dni' => '32456214A',
                'email' => 'agustinabargues@sense-son.com',
                'email_verified_at' => now(),
                'url_file' => null,
                'phone_number' => '654723698',
                'coordinator' => '1',
                'currently_working' => '0',
                'password' => bcrypt('Admin1234-'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bertin',
                'last_name' => 'Botter',
                'dni' => '26548965B',
                'email' => 'bertinbotter@sense-son.com',
                'email_verified_at' => now(),
                'url_file' => null,
                'phone_number' => '689532658',
                'coordinator' => '1',
                'currently_working' => '0',
                'password' => bcrypt('Admin1234-'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Carol',
                'last_name' => 'Carter',
                'dni' => '36249856C',
                'email' => 'carolcarter@sense-son.com',
                'email_verified_at' => now(),
                'url_file' => 'curriculumCarolCarter.pdf',
                'phone_number' => '624598657',
                'coordinator' => '0',
                'currently_working' => '0',
                'password' => bcrypt('Admin1234-'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Dani',
                'last_name' => 'Dewitt',
                'dni' => '68542369D',
                'email' => 'danidewitt@sense-son.com',
                'email_verified_at' => now(),
                'url_file' => 'curriculumDaniDewitt.pdf',
                'phone_number' => '654789566',
                'coordinator' => '0',
                'currently_working' => '1',
                'password' => bcrypt('Admin1234-'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Eric',
                'last_name' => 'Estio',
                'dni' => '49718543E',
                'email' => 'ericestio@sense-son.com',
                'email_verified_at' => now(),
                'url_file' => 'curriculumEricEstio.pdf',
                'phone_number' => '649759234',
                'coordinator' => '0',
                'currently_working' => '1',
                'password' => bcrypt('Admin1234-'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Federico',
                'last_name' => 'Fernandez',
                'dni' => '65478956F',
                'email' => 'federicofernandez@sense-son.com',
                'email_verified_at' => now(),
                'url_file' => 'curriculumFedericoFernandez.pdf',
                'phone_number' => '645782365',
                'coordinator' => '0',
                'currently_working' => '1',
                'password' => bcrypt('Admin1234-'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Gary',
                'last_name' => 'Gilbert',
                'dni' => '56784523G',
                'email' => 'garygilbert@sense-son.com',
                'email_verified_at' => now(),
                'url_file' => 'curriculumGaryGilbert.pdf',
                'phone_number' => '654523214',
                'coordinator' => '0',
                'currently_working' => '0',
                'password' => bcrypt('Admin1234-'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
