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
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-10 12:03:01',
                'created_at' => '2025-06-10 11:51:38',
                'updated_at' => '2025-06-10 12:03:01',
            ),
            1 => 
            array (
                'id' => 2,
                'karyawan_id' => 1,
                'periode_id' => 3,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-10 12:03:06',
                'created_at' => '2025-06-10 11:52:11',
                'updated_at' => '2025-06-10 12:03:06',
            ),
            2 => 
            array (
                'id' => 3,
                'karyawan_id' => 2,
                'periode_id' => 2,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:21:46',
                'updated_at' => '2025-06-10 12:21:46',
            ),
            3 => 
            array (
                'id' => 4,
                'karyawan_id' => 3,
                'periode_id' => 2,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:22:12',
                'updated_at' => '2025-06-10 12:22:12',
            ),
        ));
        
        
    }
}