<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PenilaianDetailsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('penilaian_details')->delete();
        
        \DB::table('penilaian_details')->insert(array (
            0 => 
            array (
                'id' => 1,
                'penilaian_id' => 3,
                'kriteria_id' => 1,
                'nilai' => 9,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:03',
                'updated_at' => '2025-06-15 20:41:03',
            ),
            1 => 
            array (
                'id' => 2,
                'penilaian_id' => 3,
                'kriteria_id' => 2,
                'nilai' => 9,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:03',
                'updated_at' => '2025-06-15 20:41:03',
            ),
            2 => 
            array (
                'id' => 3,
                'penilaian_id' => 3,
                'kriteria_id' => 3,
                'nilai' => 8,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:03',
                'updated_at' => '2025-06-15 20:41:03',
            ),
            3 => 
            array (
                'id' => 4,
                'penilaian_id' => 3,
                'kriteria_id' => 4,
                'nilai' => 8,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:03',
                'updated_at' => '2025-06-15 20:41:03',
            ),
            4 => 
            array (
                'id' => 5,
                'penilaian_id' => 3,
                'kriteria_id' => 5,
                'nilai' => 9,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:03',
                'updated_at' => '2025-06-15 20:41:03',
            ),
            5 => 
            array (
                'id' => 6,
                'penilaian_id' => 3,
                'kriteria_id' => 6,
                'nilai' => 8,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:03',
                'updated_at' => '2025-06-15 20:41:03',
            ),
            6 => 
            array (
                'id' => 7,
                'penilaian_id' => 3,
                'kriteria_id' => 7,
                'nilai' => 8,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:03',
                'updated_at' => '2025-06-15 20:41:03',
            ),
            7 => 
            array (
                'id' => 8,
                'penilaian_id' => 4,
                'kriteria_id' => 8,
                'nilai' => 7,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:18',
                'updated_at' => '2025-06-15 20:41:18',
            ),
            8 => 
            array (
                'id' => 9,
                'penilaian_id' => 4,
                'kriteria_id' => 9,
                'nilai' => 9,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:18',
                'updated_at' => '2025-06-15 20:41:18',
            ),
            9 => 
            array (
                'id' => 10,
                'penilaian_id' => 4,
                'kriteria_id' => 10,
                'nilai' => 8,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:18',
                'updated_at' => '2025-06-15 20:41:18',
            ),
            10 => 
            array (
                'id' => 11,
                'penilaian_id' => 4,
                'kriteria_id' => 11,
                'nilai' => 9,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:18',
                'updated_at' => '2025-06-15 20:41:18',
            ),
            11 => 
            array (
                'id' => 12,
                'penilaian_id' => 4,
                'kriteria_id' => 12,
                'nilai' => 8,
                'deleted_at' => NULL,
                'created_at' => '2025-06-15 20:41:18',
                'updated_at' => '2025-06-15 20:41:18',
            ),
        ));
        
        
    }
}