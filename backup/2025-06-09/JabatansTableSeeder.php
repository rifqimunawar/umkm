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
                'jabatan' => 'staf',
                'tupoksi' => 'mengikuti aturan yang sudah tersedia update',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-09 14:43:58',
                'created_at' => '2025-06-09 14:29:13',
                'updated_at' => '2025-06-09 14:43:58',
            ),
            1 => 
            array (
                'id' => 2,
                'jabatan' => 'Project Manager',
                'tupoksi' => 'bertanggung jawab atas project yang dipegangnya',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 14:46:08',
                'updated_at' => '2025-06-09 14:46:08',
            ),
        ));
        
        
    }
}