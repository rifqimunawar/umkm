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
                'jumlah_bahan' => 0,
                'img' => NULL,
                'satuan_id' => NULL,
                'supplier_id' => NULL,
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-19 16:42:54',
                'updated_at' => '2025-06-25 18:01:53',
            ),
            1 => 
            array (
                'id' => '0a9e586d-c67c-4080-afd7-967bd131145e',
                'nama_bahan' => 'Tepung Terigu',
                'harga_bahan' => 5000,
                'jumlah_bahan' => 9,
                'img' => NULL,
                'satuan_id' => NULL,
                'supplier_id' => NULL,
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-19 16:43:30',
                'updated_at' => '2025-06-26 11:52:29',
            ),
            2 => 
            array (
                'id' => '62ebdb59-3f56-4979-9e99-61a63bc696b8',
                'nama_bahan' => 'ENGOL',
                'harga_bahan' => 2000,
                'jumlah_bahan' => 20,
                'img' => NULL,
                'satuan_id' => NULL,
                'supplier_id' => NULL,
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-26 11:50:52',
                'created_at' => '2025-06-21 13:12:16',
                'updated_at' => '2025-06-26 11:50:52',
            ),
            3 => 
            array (
                'id' => '95572a7b-6b79-4b46-9c04-1071ebdda73f',
                'nama_bahan' => 'Telur Ayam',
                'harga_bahan' => 1000,
                'jumlah_bahan' => 10,
                'img' => NULL,
                'satuan_id' => NULL,
                'supplier_id' => NULL,
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 11:51:17',
                'updated_at' => '2025-06-26 11:51:17',
            ),
            4 => 
            array (
                'id' => '3e3dff72-6bf5-46b4-952e-8b1b32ed3853',
                'nama_bahan' => 'AIR PANAS',
                'harga_bahan' => 500,
                'jumlah_bahan' => 69,
                'img' => NULL,
                'satuan_id' => 'c30a67ae-fa4e-4eda-8cbf-37201f918651',
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:15:59',
                'updated_at' => '2025-06-28 10:18:29',
            ),
            5 => 
            array (
                'id' => '4a137baa-7f22-4bd8-82f6-de1ef882ff9b',
                'nama_bahan' => 'Kopi Hitam',
                'harga_bahan' => 2000,
                'jumlah_bahan' => 19,
                'img' => NULL,
                'satuan_id' => 'db6f3359-225c-4cbc-be8e-b44cdb4fe391',
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:17:03',
                'updated_at' => '2025-06-28 10:18:49',
            ),
        ));
        
        
    }
}