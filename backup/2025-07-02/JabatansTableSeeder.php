<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JabatansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jabatans')->delete();
        
        \DB::table('jabatans')->insert(array (
            0 => 
            array (
                'id' => 1,
            'jabatan' => 'Founder / CEO (Chief Executive Officer)',
                'tupoksi' => 'Menentukan visi bisnis, mengambil keputusan strategis, menjaga hubungan dengan klien utama dan investor, serta mengelola arah pengembangan perusahaan.',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => 'admin',
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 11:50:21',
                'updated_at' => '2025-06-10 12:05:59',
            ),
            1 => 
            array (
                'id' => 2,
                'jabatan' => 'Project Manager',
                'tupoksi' => 'Mengelola proyek pengembangan aplikasi, berkoordinasi dengan tim, mengatur timeline, scope, dan memastikan kebutuhan klien terpenuhi.',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:03:57',
                'updated_at' => '2025-06-10 12:06:17',
            ),
            2 => 
            array (
                'id' => 3,
                'jabatan' => 'UI/UX Designer',
                'tupoksi' => 'Mendesain antarmuka aplikasi agar menarik dan mudah digunakan, melakukan riset pengguna, serta membuat wireframe dan prototipe.',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:04:14',
                'updated_at' => '2025-06-10 12:06:37',
            ),
            3 => 
            array (
                'id' => 4,
                'jabatan' => 'Frontend Developer',
            'tupoksi' => 'Mengembangkan tampilan dan interaksi aplikasi di sisi pengguna (client-side), biasanya menggunakan teknologi seperti React, Vue, atau lainnya.',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:04:31',
                'updated_at' => '2025-06-10 12:06:58',
            ),
            4 => 
            array (
                'id' => 5,
                'jabatan' => 'Backend Developer',
                'tupoksi' => 'Mengembangkan sisi server, API, database, dan logika aplikasi menggunakan teknologi seperti Laravel, Node.js, atau Django.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:07:18',
                'updated_at' => '2025-06-10 12:07:18',
            ),
            5 => 
            array (
                'id' => 6,
            'jabatan' => 'Quality Assurance (QA) / Tester',
                'tupoksi' => 'Menguji aplikasi untuk memastikan bebas bug, melakukan testing fungsional, regresi, dan dokumentasi hasil uji.',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:07:36',
                'updated_at' => '2025-06-10 12:07:36',
            ),
        ));
        
        
    }
}