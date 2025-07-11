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
                'total_dibayar' => NULL,
                'is_hutang' => NULL,
                'total_hutang' => NULL,
                'img' => NULL,
                'desc' => 'meja untuk pelanaggan',
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'satuan_id' => '56a2b538-6d62-40fe-9483-5ff0217f795e',
                'jatuh_tempo' => NULL,
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 19:18:12',
                'updated_at' => '2025-06-28 19:18:12',
            ),
            1 => 
            array (
                'id' => '6e8569b4-e027-4632-89f9-510bff1fce5a',
                'nama_asset' => 'Kursi',
                'kode' => NULL,
                'harga_beli_satuan' => 50000,
                'qty' => 5,
                'total_harga_beli' => 250000,
                'harga_jual' => NULL,
                'harga_jual_satuan' => NULL,
                'total_dibayar' => 100000,
                'is_hutang' => 1,
                'total_hutang' => 150000,
                'img' => NULL,
                'desc' => NULL,
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'satuan_id' => '56a2b538-6d62-40fe-9483-5ff0217f795e',
                'jatuh_tempo' => '2025-07-12',
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-30 21:13:17',
                'updated_at' => '2025-06-30 21:13:17',
            ),
            2 => 
            array (
                'id' => '3ccb7442-3262-4990-a0bf-60a4b0bb81f5',
                'nama_asset' => 'aaa',
                'kode' => NULL,
                'harga_beli_satuan' => 50000,
                'qty' => 1,
                'total_harga_beli' => 50000,
                'harga_jual' => NULL,
                'harga_jual_satuan' => NULL,
                'total_dibayar' => 40000,
                'is_hutang' => 1,
                'total_hutang' => 10000,
                'img' => NULL,
                'desc' => NULL,
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'satuan_id' => '3e94e77f-d46a-4d39-bd9d-f4b5240a6c80',
                'jatuh_tempo' => '2025-06-27',
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-30 21:38:54',
                'updated_at' => '2025-06-30 21:39:08',
            ),
            3 => 
            array (
                'id' => '4639fe4d-b33b-439e-9685-b3cefb8621ed',
                'nama_asset' => 'Kursi',
                'kode' => NULL,
                'harga_beli_satuan' => 50000,
                'qty' => 5,
                'total_harga_beli' => 250000,
                'harga_jual' => NULL,
                'harga_jual_satuan' => NULL,
                'total_dibayar' => 100000,
                'is_hutang' => 1,
                'total_hutang' => 150000,
                'img' => NULL,
                'desc' => 'aaa',
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'satuan_id' => '56a2b538-6d62-40fe-9483-5ff0217f795e',
                'jatuh_tempo' => '2025-07-12',
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-30 21:50:58',
                'updated_at' => '2025-06-30 21:50:58',
            ),
            4 => 
            array (
                'id' => '6784aa5c-19f9-4225-9930-257c52b30cd0',
                'nama_asset' => 'Gelas Kopi',
                'kode' => NULL,
                'harga_beli_satuan' => 20000,
                'qty' => 4,
                'total_harga_beli' => 80000,
                'harga_jual' => NULL,
                'harga_jual_satuan' => NULL,
                'total_dibayar' => 80000,
                'is_hutang' => NULL,
                'total_hutang' => 0,
                'img' => NULL,
                'desc' => 'ss',
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'satuan_id' => '3e94e77f-d46a-4d39-bd9d-f4b5240a6c80',
                'jatuh_tempo' => NULL,
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-30 21:59:44',
                'updated_at' => '2025-06-30 21:59:44',
            ),
            5 => 
            array (
                'id' => 'b89e25b5-1c0b-474a-8615-8bbc21dc2989',
                'nama_asset' => 'Mesin Kopi',
                'kode' => NULL,
                'harga_beli_satuan' => 50000,
                'qty' => 1,
                'total_harga_beli' => 50000,
                'harga_jual' => NULL,
                'harga_jual_satuan' => NULL,
                'total_dibayar' => 20000,
                'is_hutang' => 1,
                'total_hutang' => 30000,
                'img' => NULL,
                'desc' => NULL,
                'supplier_id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'satuan_id' => '5ab069a0-9ac5-492f-9bbf-57c27b6b849d',
                'jatuh_tempo' => '2025-07-03',
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-30 22:00:57',
                'updated_at' => '2025-07-01 01:08:32',
            ),
        ));
        
        
    }
}