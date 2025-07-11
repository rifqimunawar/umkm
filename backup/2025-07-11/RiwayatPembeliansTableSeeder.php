<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RiwayatPembeliansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('riwayat_pembelians')->delete();
        
        \DB::table('riwayat_pembelians')->insert(array (
            0 => 
            array (
                'id' => 'd843c420-1c2d-44ed-8c91-2c9eb8bd6be4',
                'assetIdprodukIdbahanId' => '7cf61a66-6949-43be-9906-925ffc7a9d3f',
                'nama_pembelian' => 'Telur Ayam',
                'harga_satuan' => 1000,
                'qty' => 10,
                'total_harga_beli' => 10000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:08:51',
                'updated_at' => '2025-07-11 14:08:51',
            ),
            1 => 
            array (
                'id' => 'a295dc21-234e-4ca8-bf97-dc3aa1a4bf27',
                'assetIdprodukIdbahanId' => '7cbd2a6e-ed30-4913-9f94-bbd3409181a1',
                'nama_pembelian' => 'Minyak Goreng',
                'harga_satuan' => 5000,
                'qty' => 5,
                'total_harga_beli' => 25000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 15:03:42',
                'updated_at' => '2025-07-11 15:03:42',
            ),
        ));
        
        
    }
}