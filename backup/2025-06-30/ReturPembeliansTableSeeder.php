<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReturPembeliansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('retur_pembelians')->delete();
        
        \DB::table('retur_pembelians')->insert(array (
            0 => 
            array (
                'id' => '35579eac-cb68-45fe-9da5-bc8b8ffdf3a4',
                'alasan' => 'rusak',
                'nama_barang' => 'Meja',
                'harga_satuan' => 100000,
                'quantity' => 3,
                'total_harga' => 300000,
                'waktu_pembelian' => '2025-06-28 19:18:12',
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'satuan_id' => '56a2b538-6d62-40fe-9483-5ff0217f795e',
                'nama_supplier' => 'PT Sumber Rejeki',
                'id_barang' => '393caa49-44bd-4be4-beed-ca02144c6e3c',
                'sumber' => 2,
                'sumber_text' => 'assets',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-30 19:22:41',
                'updated_at' => '2025-06-30 19:22:41',
            ),
            1 => 
            array (
                'id' => 'eee6e864-a7da-4af7-b326-bf5f571ed94b',
                'alasan' => 'rusak',
                'nama_barang' => 'Meja',
                'harga_satuan' => 100000,
                'quantity' => 3,
                'total_harga' => 300000,
                'waktu_pembelian' => '2025-06-28 19:18:12',
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'satuan_id' => '56a2b538-6d62-40fe-9483-5ff0217f795e',
                'nama_supplier' => 'PT Sumber Rejeki',
                'id_barang' => '393caa49-44bd-4be4-beed-ca02144c6e3c',
                'sumber' => 2,
                'sumber_text' => 'assets',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-30 19:23:09',
                'updated_at' => '2025-06-30 19:23:09',
            ),
        ));
        
        
    }
}