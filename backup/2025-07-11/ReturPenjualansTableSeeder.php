<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReturPenjualansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('retur_penjualans')->delete();
        
        \DB::table('retur_penjualans')->insert(array (
            0 => 
            array (
                'id' => 'f5fb21ab-bc37-4436-832c-8beaa8389ec3',
                'transaksi_id' => 'e91dd1d7-4f3e-4ba9-8618-7464616c18e0',
                'item_id' => '7ab62e16-e38d-4e3d-8d89-8cd61cef98c4',
                'retur_qty' => 1,
                'alasan' => 'Rusak',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 22:34:15',
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 'beb20d52-ea03-4e13-a4b5-fc4a751ef427',
                'transaksi_id' => '141dfa61-9571-47c7-a468-5e3c77ff44fd',
                'item_id' => '20722a6c-9c06-4a06-bddb-903b0fcc62ba',
                'retur_qty' => 1,
                'alasan' => 'Rusak',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 12:48:46',
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '1eb78367-082f-4f84-84af-48b9921baef5',
                'transaksi_id' => 'ddac08cb-2216-449d-8ffe-1ddc83a3a559',
                'item_id' => '960a73c5-e89d-4007-a52b-8f1db658558a',
                'retur_qty' => 1,
                'alasan' => 'Salah Produk',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 12:57:15',
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 'ae2e781d-b307-4ba8-b5f3-e64c8de59e1b',
                'transaksi_id' => 'ddac08cb-2216-449d-8ffe-1ddc83a3a559',
                'item_id' => '7de85117-a32f-4d61-91bf-125a58eb0f35',
                'retur_qty' => 1,
                'alasan' => 'Kadaluwarsa',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 12:58:44',
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => '5e8b806c-6ef0-48b3-b6ea-1ef9d8a0ab1d',
                'transaksi_id' => 'be6e45d5-d611-434e-92ae-e023777a445f',
                'item_id' => '59ed2a4a-ffe4-4a02-a7af-50db3c4ae1d7',
                'retur_qty' => 1,
                'alasan' => 'Salah Produk',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 13:00:28',
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}