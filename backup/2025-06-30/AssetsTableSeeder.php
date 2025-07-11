<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('assets')->delete();
        
        \DB::table('assets')->insert(array (
            0 => 
            array (
                'id' => '393caa49-44bd-4be4-beed-ca02144c6e3c',
                'nama_asset' => 'Meja',
                'kode' => '90-M',
                'harga_beli_satuan' => 100000,
                'qty' => 3,
                'total_harga_beli' => 300000,
                'harga_jual' => NULL,
                'harga_jual_satuan' => NULL,
                'img' => NULL,
                'desc' => 'meja untuk pelanaggan',
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'satuan_id' => '56a2b538-6d62-40fe-9483-5ff0217f795e',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 19:18:12',
                'updated_at' => '2025-06-28 19:18:12',
            ),
        ));
        
        
    }
}