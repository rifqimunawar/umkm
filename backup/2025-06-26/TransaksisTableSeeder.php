<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaksis')->delete();
        
        \DB::table('transaksis')->insert(array (
            0 => 
            array (
                'id' => 'e71d94f2-3c7b-4d88-8fdb-25b01f6b48a1',
                'konsumen_id' => NULL,
                'nominal_belanja' => 28000,
                'nominal_dibayar' => 28000,
                'nominal_kembalian' => 0,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 11:43:37',
                'updated_at' => '2025-06-25 11:43:37',
            ),
            1 => 
            array (
                'id' => '620dfcdb-29f0-4fa5-bfaa-955816dacac2',
                'konsumen_id' => NULL,
                'nominal_belanja' => 160000,
                'nominal_dibayar' => 200000,
                'nominal_kembalian' => 40000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 11:46:01',
                'updated_at' => '2025-06-25 11:46:01',
            ),
            2 => 
            array (
                'id' => '36eb2ff9-bc50-4900-9f52-8bfba3e16423',
                'konsumen_id' => 'f90980fc-6d8c-41ee-bf51-11618fb83ca8',
                'nominal_belanja' => 25000,
                'nominal_dibayar' => 5000,
                'nominal_kembalian' => 0,
                'is_kasbon' => 1,
                'nominal_kasbon' => 20000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 11:46:30',
                'updated_at' => '2025-06-25 11:46:30',
            ),
            3 => 
            array (
                'id' => '2001b22f-4407-409f-bd54-700390159d10',
                'konsumen_id' => '078d735b-ef7c-479f-8542-d4ffaa3a6756',
                'nominal_belanja' => 25000,
                'nominal_dibayar' => 20000,
                'nominal_kembalian' => 0,
                'is_kasbon' => 1,
                'nominal_kasbon' => 5000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 11:51:08',
                'updated_at' => '2025-06-25 11:51:08',
            ),
            4 => 
            array (
                'id' => '3fd314d3-a25f-4ce3-ac55-abdd8d2e2352',
                'konsumen_id' => NULL,
                'nominal_belanja' => 25000,
                'nominal_dibayar' => 25000,
                'nominal_kembalian' => 0,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 12:41:19',
                'updated_at' => '2025-06-25 12:41:19',
            ),
            5 => 
            array (
                'id' => '7dd88a09-8616-4554-b150-f5038a2c0b26',
                'konsumen_id' => NULL,
                'nominal_belanja' => 114000,
                'nominal_dibayar' => 120000,
                'nominal_kembalian' => 6000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 12:51:38',
                'updated_at' => '2025-06-25 12:51:38',
            ),
            6 => 
            array (
                'id' => '5705da41-b3e1-4eed-9e4e-928164271549',
                'konsumen_id' => NULL,
                'nominal_belanja' => 63000,
                'nominal_dibayar' => 100000,
                'nominal_kembalian' => 37000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 12:57:50',
                'updated_at' => '2025-06-25 12:57:50',
            ),
            7 => 
            array (
                'id' => '09f087c8-7a94-49ef-a74d-a54d3358105e',
                'konsumen_id' => '0d0443ca-b8dd-4520-be31-f301d32f0214',
                'nominal_belanja' => 146000,
                'nominal_dibayar' => 100000,
                'nominal_kembalian' => 0,
                'is_kasbon' => 1,
                'nominal_kasbon' => 46000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 18:04:09',
                'updated_at' => '2025-06-25 18:04:09',
            ),
            8 => 
            array (
                'id' => 'e4073702-076d-4f3f-8c72-85c821738366',
                'konsumen_id' => NULL,
                'nominal_belanja' => 96000,
                'nominal_dibayar' => 100000,
                'nominal_kembalian' => 4000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 19:12:00',
                'updated_at' => '2025-06-25 19:12:00',
            ),
            9 => 
            array (
                'id' => '6be17039-e5a7-4b74-80de-9f265f5e25a2',
                'konsumen_id' => NULL,
                'nominal_belanja' => 32000,
                'nominal_dibayar' => 40000,
                'nominal_kembalian' => 8000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 19:12:16',
                'updated_at' => '2025-06-25 19:12:16',
            ),
            10 => 
            array (
                'id' => 'e76fdd9d-a6e8-4f23-beea-474a7594eec3',
                'konsumen_id' => NULL,
                'nominal_belanja' => 200000,
                'nominal_dibayar' => 220000,
                'nominal_kembalian' => 20000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 19:12:59',
                'updated_at' => '2025-06-25 19:12:59',
            ),
            11 => 
            array (
                'id' => '417fff3e-5f33-42ac-a990-66bb544686c1',
                'konsumen_id' => NULL,
                'nominal_belanja' => 3428000,
                'nominal_dibayar' => 3500000,
                'nominal_kembalian' => 72000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 19:14:25',
                'updated_at' => '2025-06-25 19:14:25',
            ),
            12 => 
            array (
                'id' => '45a4e761-dc9c-41a7-8f69-7604f5c8f180',
                'konsumen_id' => NULL,
                'nominal_belanja' => 421000,
                'nominal_dibayar' => 500000,
                'nominal_kembalian' => 79000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 19:14:58',
                'updated_at' => '2025-06-25 19:14:58',
            ),
            13 => 
            array (
                'id' => '9236ce84-0e11-4c72-9caf-54e6b6227e3b',
                'konsumen_id' => NULL,
                'nominal_belanja' => 175000,
                'nominal_dibayar' => 200000,
                'nominal_kembalian' => 25000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 19:15:13',
                'updated_at' => '2025-06-25 19:15:13',
            ),
        ));
        
        
    }
}