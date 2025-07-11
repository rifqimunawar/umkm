<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProduksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('produks')->delete();
        
        \DB::table('produks')->insert(array (
            0 => 
            array (
                'id' => 'f29a11be-b97d-4dfb-83de-951fa52615b2',
                'nama_produk' => 'jasjus',
                'kategori_id' => '0fd0248b-453c-4aca-9075-ed5a273762e6',
                'harga_beli' => 20000,
                'harga_jual' => NULL,
                'margin_nominal' => NULL,
                'margin_presentase' => NULL,
                'jumlah_produk' => NULL,
                'desc' => 'dd',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-18 12:28:26',
                'created_at' => '2025-06-18 12:09:33',
                'updated_at' => '2025-06-18 12:28:26',
            ),
            1 => 
            array (
                'id' => '14668215-7438-46df-9334-2871d309477b',
                'nama_produk' => 'jasjus',
                'kategori_id' => '0fd0248b-453c-4aca-9075-ed5a273762e6',
                'harga_beli' => 20000,
                'harga_jual' => 26000,
                'margin_nominal' => 6000,
                'margin_presentase' => 30,
                'jumlah_produk' => 6,
                'desc' => 'dd',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-18 12:09:59',
                'updated_at' => '2025-06-18 12:26:22',
            ),
        ));
        
        
    }
}