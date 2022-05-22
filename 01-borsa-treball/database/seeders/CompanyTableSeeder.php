<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'Sofical',
                'description' =>'Empresa nacida en Segovia y con presencia en Ávila y Madrid. Orientada a los servicios a la oficina y distribución de equipos ofimáticos, con 27 años de vida. Poseen un departamento propio de informática, realizando consultorías informáticas para dar soluciones adaptadas a los clientes. Pudiendo ofrecer desde un contrato de mantenimiento ajustado al cliente, bolsa de horas, mantenimiento anual o un todo incluido.',
                'email' =>'work.sofical@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mecatena Software',
                'description' =>'Ubicación en Cáceres y Mérida. Da soporte integral en IT. Especializados en redes, equipos, bases de datos, hardware, servidores, etc. Comercializan y dan soporte técnico de productos ofimáticos, software, multimedia, soluciones de telecomunicaciones, sistemas de reproducción de copias…',
                'email' =>'work.mecatena@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pastor Office Solutions',
                'description' =>'Localizados en Palma de Mallorca, este año es su 40 aniversario -pocas empresas del sector TIC cuentan con una trayectoria tan dilatada-. Ofrecen un amplio catálogo a las empresas, de soluciones centradas en la instalación y mantenimiento de servicios de impresión, pantallas interactivas, gestión, seguridad de sus equipos informáticos, software y comunicaciones. Con servicio técnico que da soporte constante a las infraestructuras IT, comunicación y dispositivos en red. Les puedes localizar a través de sus redes sociales Instagram, YouTube y…',
                'email' =>'work.pastor@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bulegoak Soluciones Tecnológicas',
                'description' =>'Localizada en Guipúzcoa, ofrece productos y servicios en diferentes áreas empresariales, entre las que incluyen: Servicios de infraestructura de TI, soluciones de impresión, sistemas de gestión de documentos, equipos de imagen para las oficina y soluciones de comunicación visual.',
                'email' =>'work.bulegoak@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kopy Leku',
                'description' =>'Con 30 años en Euskadi son una garantía de experiencia. No solo es distribuidor de equipos, es el asesor que necesita para optimizar los procesos documentales de su empresa. Ofrecen bolsas de horas, mantenimientos, reparaciones de equipos, software, servidores, conectividades y redes.',
                'email' =>'work.kopyleku@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Copiadoras Digitales de Huesca S. L.',
                'description' =>'Es una empresa con una trayectoria de más de 30 años de experiencia en el sector de la distribución de sistemas digitales de impresión y digitalización, ordenadores, mantenimientos de IT y mantenimiento de redes.',
                'email' =>'work.copiadorashuesca@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Copimar',
                'description' =>'Empresa de Valencia, con gran experiencia en servicios de mantenimiento informático, equipamiento IT y soluciones de seguridad. Realizan distribución, venta y mantenimiento de impresoras, copiadoras, multifunciones, faxes y escáneres. Apuestan por la transformación digital integral corporativa.',
                'email' =>'work.copimar@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sotronic',
                'description' =>'Sotronic ubicada en Vigo, nace en el año 1992 inspirada en ofrecer al sector informático una alternativa especializada en el entorno de los servicios IT de alta calidad, teniendo como pilar fundamental la innovación tecnológica, especializada en el entorno de los servicios de alta calidad y totalmente personalizados a las necesidades de las empresas y profesionales por buscar la mejora constante de sus sistemas de información.',
                'email' =>'work.sotronic@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
