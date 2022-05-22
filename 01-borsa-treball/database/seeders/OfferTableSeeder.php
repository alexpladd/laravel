<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers')->insert([
            [
                'title' => 'Desarrollador Web - Python/ Django',
                'description' =>'Actualmente estamos buscando un/a desarrollador/a web con experiencia en Python , Django y BBDD como Maria y Mongo DB
                                (React y Redux valorable). Te ofrecemos una Posición estable, con Contrato indefinido, Plan de retribución flexible, Salario acorde a la valía y experiencia del candidato/a, Horario flexible, Trabajar en un equipo altamente competitivo y con estupendo clima laboral y Formación continua. Si crees que tu perfil encaja con nuestra descripción no dudes en contactarnos.',
                'experience' =>'1',
                'annual_salary' =>'21000',
                'sent' =>'0',
                'company_id' =>'1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'DBA Senior',
                'description' =>'Somos una empresa de 25 años y buscamos un/a Administrador/a de BBDD (Oracle, DB2, Netezza, Teradata...) para el soporte al desarrollo sobre Teradata.',
                'experience' =>'5',
                'annual_salary' =>'30000',
                'sent' =>'0',
                'company_id' =>'1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'IT Administrador',
                'description' =>'Empresa multinacional situada en zona Binéfar (Huesca) que diseña y fabrica máquinas de Cash Management precisa un técnico informático/telecomunicaciones con inglés hablado y escrito para',
                'experience' =>'2',
                'annual_salary' =>'67000',
                'sent' =>'0',
                'company_id' =>'2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'SQL Senior',
                'description' =>'Te gusta la informática? Tienes experiencia en mantenimiento de equipos? Pues apúntate a nuestra oferta nuestro cliente Importante empresa de alimentación de Valladolid
tus funciones: Mantenimiento de equipos y atención a usuario con SQL. Soporte informático a administración y producción (pc, impresoras, pistolas radiofrecuencia, etc) Programación de consultas y procesos de extracción y carga de datos en bases de datos SQL. Toma de requerimientos, apoyo y soporte a negocio para la mejora y desarrollo de nuevas soluciones dentro de la organización',
                'experience' =>'1',
                'annual_salary' =>'18000',
                'sent' =>'0',
                'company_id' =>'2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tecnico Informatico',
                'description' =>'¿Quieres hacer camino con nosotros, formar parte y disfrutar de un proyecto consistente y sostenible?',
                'experience' =>'2',
                'annual_salary' =>'18000',
                'sent' =>'0',
                'company_id' =>'3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Programador Laravel/PHP senior',
                'description' =>'Se precisa incorporar diseñador(a) / programador(a) para el desarrollo de proyectos, administración, diseño de webs y apps de:
                Las diferentes web de la Compañía. Desarrollo de nuevas funcionalidades y mejoras de dichas web. Desarrollo de nuevas web (instalación y configuración del CMS; programación web y maquetación del diseño). Desarrollo de apps a medida en lenguajes nativos Android e iOs.',
                'experience' =>'2',
                'annual_salary' =>'25000',
                'sent' =>'0',
                'company_id' =>'3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ingeniero de Redes',
                'description' =>'¿Te interesa adentrarte en el sector IT con un referente como Econocom Servicios? ¿Tienes un nivel B2 de francés?
Si es así, en Econocom Servicios estamos buscando un técnico informático para Palau Solita i Plegamans para cumplir las siguientes funciones:
- Soporte a la operativa de red de tiendas.
- Atención al usuario.',
                'experience' =>'1',
                'annual_salary' =>'23000',
                'sent' =>'0',
                'company_id' =>'4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Ingeniero diseño de redes ftth',
                'description' =>'Te gusta la informática? Tienes experiencia en mantenimiento de equipos? Pues apúntate a nuestra oferta nuestro cliente Importante empresa de alimentación de Valladolid
tus funciones: Mantenimiento de equipos y atención a usuario con SQL. Soporte informático a administración y producción (pc, impresoras, pistolas radiofrecuencia, etc) Programación de consultas y procesos de extracción y carga de datos en bases de datos SQL. Toma de requerimientos, apoyo y soporte a negocio para la mejora y desarrollo de nuevas soluciones dentro de la organización',
                'experience' =>'0',
                'annual_salary' =>'16000',
                'sent' =>'0',
                'company_id' =>'4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tecnico Informático en Sistemas',
                'description' =>'empresa especializada en RRHH, queremos acompañarte en tu trayectoria laboral.
#Conectamoseltalentoconlasoportunidades
Desde la delegación de IMAN Molins de Rei precisamos incorporar a Un/a Técnico/a Informático de Software con Inglés para empresa sector químico ubicada en Sant Joan Despí.
',
                'experience' =>'4',
                'annual_salary' =>'32000',
                'sent' =>'0',
                'company_id' =>'5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tecnico servicio en red',
                'description' =>'Funciones
¿Tienes experiencia en informática? ¿Estas buscando un proyecto? Si, es así en Econocom Servicios estamos buscando un operador informático en soporte remoto, tus funciones serán:
- Monotorizar las actividades del servicio.
- Recepción, registro y resolución de incidentes y peticiones informáticas.
- Colaborar en la documentación del servicio..',
                'experience' =>'2',
                'annual_salary' =>'18000',
                'sent' =>'0',
                'company_id' =>'5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'ERP',
                'description' =>'¿Tienes experiencia en soporte informático? ¿Te interesa continuar ampliando tu experiencia y formación en una empresa líder en el sector IT? ¿Eres un entusiasta de las nuevas tecnologías y disfrutas con el trato al cliente? Si es así, en ITcSystem estamos buscando un Técnico Helpdesk dando soporte remoto y presencial a nuestros clientes, desarrollando las siguientes funciones:
- Se encontrará en primera línea de atención al cliente y deberá ser responsable para hacerse cargo de las incidencias y peticiones de inicio a fin.
- Se integrará dentro de un equipo capaz de gestionar las incidencias y peticiones de usuarios finales.
- Seguimiento técnico integral a clientes sobre aplicaciones, puestos de trabajo y servidores así como de la electrónica de red y sistemas de ciberseguridad.
',
                'experience' =>'4',
                'annual_salary' =>'55000',
                'sent' =>'0',
                'company_id' =>'6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Diseño de videojuegos',
                'description' =>'Empresa especializada en RRHH, queremos acompañarte en tu trayectoria laboral.
#Conectamoseltalentoconlasoportunidades
Desde la delegación de IMAN Molins de Rei precisamos incorporar a Un/a Técnico/a Informático de Software con Inglés para empresa sector químico ubicada en Sant Joan Despí.
',
                'experience' =>'2',
                'annual_salary' =>'23000',
                'sent' =>'0',
                'company_id' =>'6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sistema Gestor de Base de Datos',
                'description' =>'
Funciones
¿Tienes experiencia en informática? ¿Estas buscando un proyecto? Si, es así en Econocom Servicios estamos buscando un operador informático en soporte remoto, tus funciones serán:
- Monotorizar las actividades del servicio.
- Recepción, registro y resolución de incidentes y peticiones informáticas.
- Colaborar en la documentación del servicio..',
                'experience' =>'1',
                'annual_salary' =>'20000',
                'sent' =>'0',
                'company_id' =>'7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Programador Web',
                'description' =>'¿Tienes experiencia en soporte informático? ¿Te interesa continuar ampliando tu experiencia y formación en una empresa líder en el sector IT? ¿Eres un entusiasta de las nuevas tecnologías y disfrutas con el trato al cliente? Si es así, en ITcSystem estamos buscando un Técnico Helpdesk dando soporte remoto y presencial a nuestros clientes, desarrollando las siguientes funciones:
- Se encontrará en primera línea de atención al cliente y deberá ser responsable para hacerse cargo de las incidencias y peticiones de inicio a fin.
- Se integrará dentro de un equipo capaz de gestionar las incidencias y peticiones de usuarios finales.
- Seguimiento técnico integral a clientes sobre aplicaciones, puestos de trabajo y servidores así como de la electrónica de red y sistemas de ciberseguridad.
',
                'experience' =>'0',
                'annual_salary' =>'12000',
                'sent' =>'0',
                'company_id' =>'7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tecnico Informático',
                'description' =>'¿Tienes buen nivel en alemán e inglés? ¿Te motiva el soporte remoto a usuarios? ¿Quieres formar parte de una empresa líder en crecimiento?',
                'experience' =>'2',
                'annual_salary' =>'20000',
                'sent' =>'0',
                'company_id' =>'8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tecnico Soporte Informático',
                'description' =>'¿Te interesa adentrarte en el sector IT con un referente como Econocom Servicios? ¿Tienes un nivel B2 de francés?
Si es así, en Econocom Servicios estamos buscando un técnico informático para Palau Solita i Plegamans para cumplir las siguientes funciones:
- Soporte a la operativa de red de tiendas.
- Atención al usuario.',
                'experience' =>'4',
                'annual_salary' =>'40000',
                'sent' =>'0',
                'company_id' =>'8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
