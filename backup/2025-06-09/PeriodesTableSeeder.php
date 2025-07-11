<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PeriodesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('periodes')->delete();
        
        \DB::table('periodes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'bulan' => 'Oktober',
                'tahun' => '2025',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-09 14:11:45',
                'created_at' => '2025-06-09 14:08:49',
                'updated_at' => '2025-06-09 14:11:45',
            ),
            1 => 
            array (
                'id' => 2,
                'bulan' => 'Januari',
                'tahun' => '2025',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 14:11:56',
                'updated_at' => '2025-06-09 14:11:56',
            ),
            2 => 
            array (
                'id' => 3,
                'bulan' => 'Februari',
                'tahun' => '2025',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 14:12:05',
                'updated_at' => '2025-06-09 14:12:05',
            ),
            3 => 
            array (
                'id' => 4,
                'bulan' => 'Maret',
                'tahun' => '2025',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 14:12:15',
                'updated_at' => '2025-06-09 14:12:15',
            ),
            4 => 
            array (
                'id' => 5,
                'bulan' => 'April',
                'tahun' => '2025',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 14:12:23',
                'updated_at' => '2025-06-09 14:12:23',
            ),
        ));
        
        
    }
}