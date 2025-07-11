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
                'id' => 'a792493b-c7a0-4355-85e2-f3b86e6261fe',
                'transaksi_id' => '16b1b30e-426f-4589-87c2-93ba52168e90',
                'produk_id' => '52ebcf82-e611-49a3-989a-045f89ad30f8',
                'nama_produk' => 'DONAT',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 1000,
                'qty' => 2,
                'total_harga_produk' => 2000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:11:27',
                'updated_at' => '2025-07-03 00:11:27',
            ),
            1 => 
            array (
                'id' => '18ec6b46-b882-4ed1-9b76-803777ee6373',
                'transaksi_id' => '6c1d8e08-e0b1-4c83-a694-c790aa3bbe4b',
                'produk_id' => '7f49480c-18cb-4f6a-a7de-6382ba72c4cc',
                'nama_produk' => 'NABATI WAFER',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 3000,
                'qty' => 1,
                'total_harga_produk' => 3000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:12:25',
                'updated_at' => '2025-07-03 00:12:25',
            ),
            2 => 
            array (
                'id' => 'd14dcabb-8cdb-457e-b4a4-ec04edf4012c',
                'transaksi_id' => '14fba9f3-d415-4710-83d9-1e1cb92045f1',
                'produk_id' => '52ebcf82-e611-49a3-989a-045f89ad30f8',
                'nama_produk' => 'DONAT',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 1000,
                'qty' => 1,
                'total_harga_produk' => 1000,
                'created_by' => 'udin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:47:32',
                'updated_at' => '2025-07-03 00:47:32',
            ),
            3 => 
            array (
                'id' => '7210be58-292c-4020-b07c-9f408a8d703a',
                'transaksi_id' => '9be36e3d-55b2-43df-a755-f09eba2dd30c',
                'produk_id' => '7f49480c-18cb-4f6a-a7de-6382ba72c4cc',
                'nama_produk' => 'NABATI WAFER',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 3000,
                'qty' => 1,
                'total_harga_produk' => 3000,
                'created_by' => 'udin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:48:54',
                'updated_at' => '2025-07-03 00:48:54',
            ),
            4 => 
            array (
                'id' => '9b8faca6-b17a-41df-bdfc-c2645384e2b7',
                'transaksi_id' => 'cbf97788-6b9d-4937-aa36-75bca8687cb5',
                'produk_id' => '52ebcf82-e611-49a3-989a-045f89ad30f8',
                'nama_produk' => 'DONAT',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 1000,
                'qty' => 1,
                'total_harga_produk' => 1000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 20:15:17',
                'updated_at' => '2025-07-03 20:15:17',
            ),
            5 => 
            array (
                'id' => '7ab62e16-e38d-4e3d-8d89-8cd61cef98c4',
                'transaksi_id' => 'e91dd1d7-4f3e-4ba9-8618-7464616c18e0',
                'produk_id' => '52ebcf82-e611-49a3-989a-045f89ad30f8',
                'nama_produk' => 'DONAT',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 1000,
                'qty' => 0,
                'total_harga_produk' => 0,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 21:22:45',
                'updated_at' => '2025-07-03 22:34:15',
            ),
            6 => 
            array (
                'id' => '75bf7e83-f7d6-4ca9-ab16-5de6c9a46e0a',
                'transaksi_id' => '5723ca22-9d43-4de8-a9cb-7ec0abe88d7f',
                'produk_id' => '52ebcf82-e611-49a3-989a-045f89ad30f8',
                'nama_produk' => 'DONAT',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 1000,
                'qty' => 1,
                'total_harga_produk' => 1000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-04 11:00:01',
                'updated_at' => '2025-07-04 11:00:01',
            ),
            7 => 
            array (
                'id' => 'e439eec5-f11c-4960-ae82-4bc14083a115',
                'transaksi_id' => '1729d54f-a770-494d-ac04-b120969cd287',
                'produk_id' => '52ebcf82-e611-49a3-989a-045f89ad30f8',
                'nama_produk' => 'DONAT',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 1000,
                'qty' => 1,
                'total_harga_produk' => 1000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-04 11:50:27',
                'updated_at' => '2025-07-04 11:50:27',
            ),
            8 => 
            array (
                'id' => 'b8395c2e-fc2e-4a25-80df-9a8fdcabd350',
                'transaksi_id' => 'e383edb4-e67d-49c5-bba3-e67db5779470',
                'produk_id' => '7f49480c-18cb-4f6a-a7de-6382ba72c4cc',
                'nama_produk' => 'NABATI WAFER',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 3000,
                'qty' => 2,
                'total_harga_produk' => 6000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-04 11:52:34',
                'updated_at' => '2025-07-04 11:52:34',
            ),
            9 => 
            array (
                'id' => '6ae9e8d3-a028-4ce7-976f-8d5cc05fb294',
                'transaksi_id' => 'e383edb4-e67d-49c5-bba3-e67db5779470',
                'produk_id' => '52ebcf82-e611-49a3-989a-045f89ad30f8',
                'nama_produk' => 'DONAT',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 1000,
                'qty' => 1,
                'total_harga_produk' => 1000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-04 11:52:34',
                'updated_at' => '2025-07-04 11:52:34',
            ),
            10 => 
            array (
                'id' => '20722a6c-9c06-4a06-bddb-903b0fcc62ba',
                'transaksi_id' => '141dfa61-9571-47c7-a468-5e3c77ff44fd',
                'produk_id' => 'aac2cc82-4cee-4428-8bdf-0eacc7cceb62',
                'nama_produk' => 'DUNHILL 16 BATANG',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 30000,
                'qty' => 1,
                'total_harga_produk' => 30000,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 12:47:48',
                'updated_at' => '2025-07-11 12:48:46',
            ),
            11 => 
            array (
                'id' => '7de85117-a32f-4d61-91bf-125a58eb0f35',
                'transaksi_id' => 'ddac08cb-2216-449d-8ffe-1ddc83a3a559',
                'produk_id' => 'aac2cc82-4cee-4428-8bdf-0eacc7cceb62',
                'nama_produk' => 'DUNHILL 16 BATANG',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 30000,
                'qty' => 0,
                'total_harga_produk' => 0,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 12:55:23',
                'updated_at' => '2025-07-11 12:58:44',
            ),
            12 => 
            array (
                'id' => '960a73c5-e89d-4007-a52b-8f1db658558a',
                'transaksi_id' => 'ddac08cb-2216-449d-8ffe-1ddc83a3a559',
                'produk_id' => '7f49480c-18cb-4f6a-a7de-6382ba72c4cc',
                'nama_produk' => 'NABATI WAFER',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 3000,
                'qty' => 0,
                'total_harga_produk' => 0,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 12:55:23',
                'updated_at' => '2025-07-11 12:57:15',
            ),
            13 => 
            array (
                'id' => '59ed2a4a-ffe4-4a02-a7af-50db3c4ae1d7',
                'transaksi_id' => 'be6e45d5-d611-434e-92ae-e023777a445f',
                'produk_id' => 'aac2cc82-4cee-4428-8bdf-0eacc7cceb62',
                'nama_produk' => 'DUNHILL 16 BATANG',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 30000,
                'qty' => 0,
                'total_harga_produk' => 0,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 13:00:03',
                'updated_at' => '2025-07-11 13:00:28',
            ),
            14 => 
            array (
                'id' => '8b28ea9a-c5ab-4120-b797-1d634c8fd949',
                'transaksi_id' => 'd9538691-d103-44a0-b147-3f0daab7b359',
                'produk_id' => '320833dc-19a9-44f6-872d-68458025cee4',
                'nama_produk' => 'Omnis et est officii',
                'nama_kategori_produk' => NULL,
                'harga_satuan_produk' => 3000,
                'qty' => 1,
                'total_harga_produk' => 3000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 19:25:33',
                'updated_at' => '2025-07-11 19:25:33',
            ),
        ));
        
        
    }
}