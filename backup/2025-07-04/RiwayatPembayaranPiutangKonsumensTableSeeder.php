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
                'id' => 'f7d6573c-9551-4cfc-a404-34b71c54f60f',
                'transaksi_id' => '62fdaa9c-0515-46b5-8496-36dddbb3ca5c',
                'konsumen_id' => 'a783f395-4ecb-44a9-b0f0-a015c6d6b357',
                'nama_konsumen' => 'Udin Petot',
                'nominal_belanja' => '6000',
                'nominal_dibayar' => '1000',
                'nominal_kasbon' => '5000',
                'nominal_pembayaran_kasbon' => '3000',
                'nominal_sisa_kasbon' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 13:58:53',
                'updated_at' => '2025-06-28 13:58:53',
            ),
            1 => 
            array (
                'id' => '3993c1b4-8cf0-42ba-8c43-bde8438096fe',
                'transaksi_id' => '62fdaa9c-0515-46b5-8496-36dddbb3ca5c',
                'konsumen_id' => 'a783f395-4ecb-44a9-b0f0-a015c6d6b357',
                'nama_konsumen' => 'Udin Petot',
                'nominal_belanja' => '6000',
                'nominal_dibayar' => '1000',
                'nominal_kasbon' => '2000',
                'nominal_pembayaran_kasbon' => '1000',
                'nominal_sisa_kasbon' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 13:59:10',
                'updated_at' => '2025-06-28 13:59:10',
            ),
            2 => 
            array (
                'id' => '4fa3ea6c-82d8-4e39-af86-f47eb7766d4b',
                'transaksi_id' => '62fdaa9c-0515-46b5-8496-36dddbb3ca5c',
                'konsumen_id' => 'a783f395-4ecb-44a9-b0f0-a015c6d6b357',
                'nama_konsumen' => 'Udin Petot',
                'nominal_belanja' => '6000',
                'nominal_dibayar' => '1000',
                'nominal_kasbon' => '1000',
                'nominal_pembayaran_kasbon' => '1000',
                'nominal_sisa_kasbon' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 13:59:21',
                'updated_at' => '2025-06-28 13:59:21',
            ),
            3 => 
            array (
                'id' => '69f43b74-969a-4258-bad6-3f37932db669',
                'transaksi_id' => '80738bd4-7581-419d-955d-75bcb9d5987f',
                'konsumen_id' => '4e4f68b8-c9de-4d8b-9531-273f1b705547',
                'nama_konsumen' => 'jokowi',
                'nominal_belanja' => '20000',
                'nominal_dibayar' => '5000',
                'nominal_kasbon' => '15000',
                'nominal_pembayaran_kasbon' => '10000',
                'nominal_sisa_kasbon' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 11:13:24',
                'updated_at' => '2025-06-29 11:13:24',
            ),
        ));
        
        
    }
}