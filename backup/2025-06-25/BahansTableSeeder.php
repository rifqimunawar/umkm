<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BahansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bahans')->delete();
        
        \DB::table('bahans')->insert(array (
            0 => 
            array (
                'id' => '70262a51-841a-4a10-88f8-48dcfaafccd5',
                'nama_bahan' => 'Telur Ayam',
                'harga_bahan' => 5000,
                'jumlah_bahan' => 10,
                'img' => NULL,
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-19 16:42:54',
                'updated_at' => '2025-06-21 13:11:47',
            ),
            1 => 
            array (
                'id' => '0a9e586d-c67c-4080-afd7-967bd131145e',
                'nama_bahan' => 'Tepung Terigu',
                'harga_bahan' => 5000,
                'jumlah_bahan' => 10,
                'img' => NULL,
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-19 16:43:30',
                'updated_at' => '2025-06-21 13:11:34',
            ),
            2 => 
            array (
                'id' => '62ebdb59-3f56-4979-9e99-61a63bc696b8',
                'nama_bahan' => 'ENGOL',
                'harga_bahan' => 2000,
                'jumlah_bahan' => 20,
                'img' => NULL,
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-21 13:12:16',
                'updated_at' => '2025-06-21 13:12:16',
            ),
        ));
        
        
    }
}