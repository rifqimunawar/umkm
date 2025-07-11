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
                'id' => '696acce8-7970-4409-842b-f47a96ad1acb',
                'transaksi_id' => '7f0b6614-0ea9-40cc-9f45-93033f17ff23',
                'produk_id' => '8e11389e-9b05-4983-a2d2-e408ddde70d1',
                'nama_produk' => 'Kopi Seduh',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 3000,
                'qty' => 1,
                'total_harga_produk' => 3000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:36:51',
                'updated_at' => '2025-06-26 14:36:51',
            ),
            1 => 
            array (
                'id' => '9e4e4d89-efc9-4d1a-bbdf-576536130dc4',
                'transaksi_id' => '9c8772e4-fe35-4085-a896-dbd5fb46d729',
                'produk_id' => '8e11389e-9b05-4983-a2d2-e408ddde70d1',
                'nama_produk' => 'Kopi Seduh',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 3000,
                'qty' => 1,
                'total_harga_produk' => 3000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:39:23',
                'updated_at' => '2025-06-26 14:39:23',
            ),
            2 => 
            array (
                'id' => 'ea0f355d-493b-476c-96d0-961b94fef459',
                'transaksi_id' => 'dd5e4618-deb5-42f3-bc48-724915340488',
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
                'created_at' => '2025-06-26 14:39:54',
                'updated_at' => '2025-06-26 14:39:54',
            ),
            3 => 
            array (
                'id' => '23be97c0-53ab-4cee-8bc8-7c2e25d7dc9d',
                'transaksi_id' => 'ab4bbda6-6210-42fa-b186-0e74dc708489',
                'produk_id' => '110749e4-0c88-4365-bfae-6d2420d289d4',
                'nama_produk' => 'Pocari Sweat Minuman Isotonik Botol 500 mliter',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 6000,
                'qty' => 1,
                'total_harga_produk' => 6000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:41:37',
                'updated_at' => '2025-06-26 14:41:37',
            ),
            4 => 
            array (
                'id' => '8f274231-3f29-4c0e-9424-74c9e383e606',
                'transaksi_id' => 'b4f28582-a6ef-454a-b65e-4b9b2cacda89',
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
                'created_at' => '2025-06-26 14:42:23',
                'updated_at' => '2025-06-26 14:42:23',
            ),
            5 => 
            array (
                'id' => 'c19561d1-640b-4fce-9da3-2b83e0cb8236',
                'transaksi_id' => '5801325c-9b1b-4687-a66d-fef28a1da3bc',
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
                'created_at' => '2025-06-26 14:42:51',
                'updated_at' => '2025-06-26 14:42:51',
            ),
            6 => 
            array (
                'id' => '2f136376-a9fa-4caf-8b80-e33670f2106a',
                'transaksi_id' => '62fdaa9c-0515-46b5-8496-36dddbb3ca5c',
                'produk_id' => '110749e4-0c88-4365-bfae-6d2420d289d4',
                'nama_produk' => 'Pocari Sweat Minuman Isotonik Botol 500 mliter',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 6000,
                'qty' => 1,
                'total_harga_produk' => 6000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 19:00:51',
                'updated_at' => '2025-06-26 19:00:51',
            ),
            7 => 
            array (
                'id' => '4344b509-bd96-4351-b4aa-f322b0a6ba7e',
                'transaksi_id' => '250b5187-e996-4eeb-a0e0-fadd54ad33a2',
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
                'created_at' => '2025-06-27 15:06:05',
                'updated_at' => '2025-06-27 15:06:05',
            ),
            8 => 
            array (
                'id' => '07d1d224-a29e-4a34-88f8-fcddbd9fb171',
                'transaksi_id' => '1f9fae61-ea2e-410c-ad0f-4c587dbb6d79',
                'produk_id' => '1e59a31f-c034-49b3-b5a5-17f0398fbad0',
                'nama_produk' => 'Kopi Seduh',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 80000,
                'qty' => 2,
                'total_harga_produk' => 160000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-27 17:21:43',
                'updated_at' => '2025-06-27 17:21:43',
            ),
            9 => 
            array (
                'id' => '2fc26dd1-60e4-4fcc-a719-7317d4aee857',
                'transaksi_id' => '0a2be495-1ef3-4348-9e4f-e3cecebf0dc7',
                'produk_id' => '40d6576c-5898-4ecc-9e61-83c1453e103f',
                'nama_produk' => 'Kopi Hitam Seduh',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 20000,
                'qty' => 2,
                'total_harga_produk' => 40000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-27 18:09:23',
                'updated_at' => '2025-06-27 18:09:23',
            ),
            10 => 
            array (
                'id' => 'e86e919c-605f-404a-b8a4-a6f57ad891e7',
                'transaksi_id' => '8fe51e47-8aa5-4194-8663-fe120c9449e1',
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
                'created_at' => '2025-06-28 09:14:51',
                'updated_at' => '2025-06-28 09:14:51',
            ),
            11 => 
            array (
                'id' => '47a0873b-18f1-4f77-bd1a-b4a7882cc744',
                'transaksi_id' => '71decf24-02a5-40a6-aa3e-b7c8d7131de0',
                'produk_id' => '40d6576c-5898-4ecc-9e61-83c1453e103f',
                'nama_produk' => 'Kopi Hitam Seduh',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 20000,
                'qty' => 2,
                'total_harga_produk' => 40000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 09:15:11',
                'updated_at' => '2025-06-28 09:15:11',
            ),
            12 => 
            array (
                'id' => '45e10530-c4c2-4ffe-9626-290e7afd355e',
                'transaksi_id' => '80738bd4-7581-419d-955d-75bcb9d5987f',
                'produk_id' => '40d6576c-5898-4ecc-9e61-83c1453e103f',
                'nama_produk' => 'Kopi Hitam Seduh',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 20000,
                'qty' => 1,
                'total_harga_produk' => 20000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 11:11:05',
                'updated_at' => '2025-06-29 11:11:05',
            ),
        ));
        
        
    }
}