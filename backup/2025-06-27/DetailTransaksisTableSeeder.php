<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DetailTransaksisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('detail_transaksis')->delete();
        
        \DB::table('detail_transaksis')->insert(array (
            0 => 
            array (
                'id' => 'b0125f0f-7216-4cce-af37-c2bf68c92fbc',
                'transaksi_id' => '224475ae-aef9-46f9-9c54-b6f9db27604f',
                'produk_id' => 'b8760039-4b68-4dc6-8a80-58a351ba09a1',
                'nama_produk' => 'Bala Bala',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 6000,
                'qty' => 1,
                'total_harga_produk' => 6000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 11:53:33',
                'updated_at' => '2025-06-26 11:53:33',
            ),
            1 => 
            array (
                'id' => 'b1b105d3-8fed-4342-99e8-24f02775dad4',
                'transaksi_id' => 'b366da54-8f22-4c21-a65c-a70153a2b874',
                'produk_id' => 'b8760039-4b68-4dc6-8a80-58a351ba09a1',
                'nama_produk' => 'Bala Bala',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 6000,
                'qty' => 1,
                'total_harga_produk' => 6000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 11:54:58',
                'updated_at' => '2025-06-26 11:54:58',
            ),
        ));
        
        
    }
}