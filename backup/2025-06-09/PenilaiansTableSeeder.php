<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PenilaiansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('penilaians')->delete();
        
        \DB::table('penilaians')->insert(array (
            0 => 
            array (
                'id' => 1,
                'karyawan_id' => 1,
                'periode_id' => 2,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 17:59:55',
                'updated_at' => '2025-06-09 17:59:55',
            ),
            1 => 
            array (
                'id' => 2,
                'karyawan_id' => 1,
                'periode_id' => 3,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 18:13:29',
                'updated_at' => '2025-06-09 18:13:29',
            ),
        ));
        
        
    }
}