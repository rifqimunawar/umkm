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
                'id' => '72b698c5-b8fa-49c5-bbe1-ac50eca91b45',
                'alasan' => 'AAAAA',
                'nama_barang' => 'Telur Ayam',
                'harga_satuan' => 2500,
                'total_harga' => 25000,
                'waktu_pembelian' => '2025-07-02 23:50:26',
                'supplier_id' => 'b9f683be-70b0-4a22-92f8-60dd476846ef',
                'satuan_id' => '7d17e42c-833a-4321-a456-f7ae88133363',
                'nama_supplier' => 'PT Sumber Rejeki',
                'id_barang' => 'ac3c21b0-9e16-4def-98f0-93a016318345',
                'sumber' => 1,
                'qty_retur' => NULL,
                'quantity' => NULL,
                'sumber_text' => 'bahans',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:17:02',
                'updated_at' => '2025-07-03 00:17:02',
            ),
            1 => 
            array (
                'id' => 'a20cfb59-89f5-48da-b42e-4562d0f8be61',
                'alasan' => 'busuk',
                'nama_barang' => 'TERIGU',
                'harga_satuan' => 3500,
                'total_harga' => 14000,
                'waktu_pembelian' => '2025-07-02 23:59:52',
                'supplier_id' => 'b9f683be-70b0-4a22-92f8-60dd476846ef',
                'satuan_id' => '5ab069a0-9ac5-492f-9bbf-57c27b6b849d',
                'nama_supplier' => 'PT Sumber Rejeki',
                'id_barang' => 'be6a11b8-c2b0-4229-b558-68af0fd60d95',
                'sumber' => 1,
                'qty_retur' => 1,
                'quantity' => 4,
                'sumber_text' => 'bahans',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 11:53:10',
                'updated_at' => '2025-07-11 11:53:10',
            ),
        ));
        
        
    }
}