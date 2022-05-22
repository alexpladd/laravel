<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('studies')->insert([
            [
                'name' => 'DAM',
                'duration' => 2,
                'description' => "El Cicle Formatiu de Grau Superior DAM (Desenvolupament d'Aplicacions Multiplataforma), et permetrà treballar desenvolupant, implantant, documentant i mantenint aplicacions informàtiques multiplataforma en totes les empreses del sector.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ASIX',
                'duration' => 2,
                'description' => "El Cicle Formatiu de Grau Superior ASIX (Administració de Sistemes Informàtics en Xarxa), et permetrà treballar en empreses de diferents sectors dins del departament d'informàtica o de procesaments de dades, exercint funcions com ara instal·lació, manteniment, explotació i suport de l'usuari informàtic.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DAW',
                'duration' => 2,
                'description' => "El Cicle Formatiu de Grau Superior DAW (Desenvolupament d'Aplicacions Web), et permetrà treballar en l'àrea de desenvolupament, implantació i manteniment d'aplicacions informàtiques relacionades amb entorns Web (intranet, extranet i internet).",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'DAMvi',
                'duration' => 2,
                'description' => "El Cicle Formatiu de Grau Superior DAMvi (Desenvolupament d'Aplicacions Multimèdia de Videojocs), et permetrà treballar en l'àrea de desenvolupament, implantació i manteniment de videojocs.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SMX',
                'duration' => 2,
                'description' => "El Cicle Formatiu de Grau Mitjà SMX (Sistemes Microinformàtics i Xarxes), et permetrà treballar en empreses del sector serveis que es dediquin a la comercialització, muntatge i reparació d'equips, xarxes i serveis microinformàtics en general, com a part del suport informàtic de l'organització o en entitats de qualsevol grandària i sector productiu que utilitzen sistemes microinformàtics i xarxes de dades per a la seva gestió.",
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
