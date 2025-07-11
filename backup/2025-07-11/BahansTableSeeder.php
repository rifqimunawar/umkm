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
                'id' => 'ac3c21b0-9e16-4def-98f0-93a016318345',
                'nama_bahan' => 'Telur Ayam',
                'harga_bahan' => 2500,
                'jumlah_bahan' => 10,
                'img' => NULL,
                'satuan_id' => '7d17e42c-833a-4321-a456-f7ae88133363',
                'supplier_id' => 'b9f683be-70b0-4a22-92f8-60dd476846ef',
                'desc' => NULL,
                'total_harga_bahan' => 25000,
                'total_dibayar' => 25000,
                'is_hutang' => NULL,
                'total_hutang' => 0,
                'jatuh_tempo' => NULL,
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-07-03 00:17:02',
                'created_at' => '2025-07-02 23:50:26',
                'updated_at' => '2025-07-03 00:17:02',
            ),
            1 => 
            array (
                'id' => 'be6a11b8-c2b0-4229-b558-68af0fd60d95',
                'nama_bahan' => 'TERIGU',
                'harga_bahan' => 3500,
                'jumlah_bahan' => 0,
                'img' => NULL,
                'satuan_id' => '5ab069a0-9ac5-492f-9bbf-57c27b6b849d',
                'supplier_id' => 'b9f683be-70b0-4a22-92f8-60dd476846ef',
                'desc' => NULL,
                'total_harga_bahan' => 17500,
                'total_dibayar' => 17500,
                'is_hutang' => NULL,
                'total_hutang' => 0,
                'jatuh_tempo' => NULL,
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:59:52',
                'updated_at' => '2025-07-11 14:24:08',
            ),
            2 => 
            array (
                'id' => '7cf61a66-6949-43be-9906-925ffc7a9d3f',
                'nama_bahan' => 'Telur Ayam',
                'harga_bahan' => 1000,
                'jumlah_bahan' => 1,
                'img' => NULL,
                'satuan_id' => '7d17e42c-833a-4321-a456-f7ae88133363',
                'supplier_id' => 'b9f683be-70b0-4a22-92f8-60dd476846ef',
                'desc' => NULL,
                'total_harga_bahan' => 10000,
                'total_dibayar' => 10000,
                'is_hutang' => NULL,
                'total_hutang' => 0,
                'jatuh_tempo' => NULL,
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:08:51',
                'updated_at' => '2025-07-11 14:29:49',
            ),
            3 => 
            array (
                'id' => '7cbd2a6e-ed30-4913-9f94-bbd3409181a1',
                'nama_bahan' => 'Minyak Goreng',
                'harga_bahan' => 5000,
                'jumlah_bahan' => 5,
                'img' => NULL,
                'satuan_id' => '3e94e77f-d46a-4d39-bd9d-f4b5240a6c80',
                'supplier_id' => '816de16d-a8c5-4381-baea-f6661aded260',
                'desc' => NULL,
                'total_harga_bahan' => 25000,
                'total_dibayar' => 20000,
                'is_hutang' => 1,
                'total_hutang' => 2500,
                'jatuh_tempo' => '2025-07-31',
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 15:03:42',
                'updated_at' => '2025-07-11 18:42:59',
            ),
            4 => 
            array (
                'id' => 'd63032b7-ed61-4660-8749-1b66aba1b77f',
                'nama_bahan' => 'Sabun Colek',
                'harga_bahan' => 1000,
                'jumlah_bahan' => 30,
                'img' => NULL,
                'satuan_id' => 'e599453e-2a3c-4d75-974c-7e75f58d77d3',
                'supplier_id' => 'b9f683be-70b0-4a22-92f8-60dd476846ef',
                'desc' => 'sss',
                'total_harga_bahan' => 30000,
                'total_dibayar' => 15000,
                'is_hutang' => 1,
                'total_hutang' => 5000,
                'jatuh_tempo' => '2025-07-18',
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 19:03:27',
                'updated_at' => '2025-07-11 19:19:18',
            ),
            5 => 
            array (
                'id' => 'c80e07d1-43b7-41da-bc54-008a6c7813fb',
                'nama_bahan' => 'micin',
                'harga_bahan' => 500,
                'jumlah_bahan' => 100,
                'img' => NULL,
                'satuan_id' => 'e599453e-2a3c-4d75-974c-7e75f58d77d3',
                'supplier_id' => '816de16d-a8c5-4381-baea-f6661aded260',
                'desc' => NULL,
                'total_harga_bahan' => 50000,
                'total_dibayar' => 30000,
                'is_hutang' => 1,
                'total_hutang' => 20000,
                'jatuh_tempo' => '2025-07-17',
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 19:23:15',
                'updated_at' => '2025-07-11 19:24:09',
            ),
        ));
        
        
    }
}