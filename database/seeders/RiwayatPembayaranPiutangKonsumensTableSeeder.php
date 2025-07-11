<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RiwayatPembayaranPiutangKonsumensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('riwayat_pembayaran_piutang_konsumens')->delete();
        
        \DB::table('riwayat_pembayaran_piutang_konsumens')->insert(array (
            0 => 
            array (
                'id' => '0ecfd067-f168-4b46-9d95-af9955a82639',
                'transaksi_id' => '16b1b30e-426f-4589-87c2-93ba52168e90',
                'konsumen_id' => 'ec36dcc4-bccc-45dd-b7db-2647dba4e91e',
                'nama_konsumen' => 'PRABOWO',
                'nominal_belanja' => '2000',
                'nominal_dibayar' => '500',
                'nominal_kasbon' => '1500',
                'nominal_pembayaran_kasbon' => '500',
                'nominal_sisa_kasbon' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:13:51',
                'updated_at' => '2025-07-03 00:13:51',
            ),
            1 => 
            array (
                'id' => 'e2c76832-1d07-4ea3-b820-e71b8b67f335',
                'transaksi_id' => '16b1b30e-426f-4589-87c2-93ba52168e90',
                'konsumen_id' => 'ec36dcc4-bccc-45dd-b7db-2647dba4e91e',
                'nama_konsumen' => 'PRABOWO',
                'nominal_belanja' => '2000',
                'nominal_dibayar' => '500',
                'nominal_kasbon' => '1000',
                'nominal_pembayaran_kasbon' => '1000',
                'nominal_sisa_kasbon' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:14:06',
                'updated_at' => '2025-07-03 00:14:06',
            ),
            2 => 
            array (
                'id' => 'bbc279ad-760c-4dbe-b10a-cfc7669595ad',
                'transaksi_id' => '9be36e3d-55b2-43df-a755-f09eba2dd30c',
                'konsumen_id' => '2dad193e-96eb-485c-b7ee-6bede853e7ee',
                'nama_konsumen' => 'imin',
                'nominal_belanja' => '3000',
                'nominal_dibayar' => '1000',
                'nominal_kasbon' => '2000',
                'nominal_pembayaran_kasbon' => '2000',
                'nominal_sisa_kasbon' => NULL,
                'created_by' => 'udin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:50:18',
                'updated_at' => '2025-07-03 00:50:18',
            ),
            3 => 
            array (
                'id' => '92a61d39-4798-4f47-ae9c-fcb2c6f40eec',
                'transaksi_id' => 'e91dd1d7-4f3e-4ba9-8618-7464616c18e0',
                'konsumen_id' => '2dad193e-96eb-485c-b7ee-6bede853e7ee',
                'nama_konsumen' => 'imin',
                'nominal_belanja' => '3000',
                'nominal_dibayar' => '2000',
                'nominal_kasbon' => '1000',
                'nominal_pembayaran_kasbon' => '500',
                'nominal_sisa_kasbon' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 21:23:29',
                'updated_at' => '2025-07-03 21:23:29',
            ),
        ));
        
        
    }
}