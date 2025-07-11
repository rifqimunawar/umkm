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
                'id' => '7f0b6614-0ea9-40cc-9f45-93033f17ff23',
                'konsumen_id' => NULL,
                'nominal_belanja' => 3000,
                'nominal_dibayar' => 5000,
                'nominal_kembalian' => 2000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:36:51',
                'updated_at' => '2025-06-26 14:36:51',
            ),
            1 => 
            array (
                'id' => '9c8772e4-fe35-4085-a896-dbd5fb46d729',
                'konsumen_id' => NULL,
                'nominal_belanja' => 3000,
                'nominal_dibayar' => 5000,
                'nominal_kembalian' => 2000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:39:23',
                'updated_at' => '2025-06-26 14:39:23',
            ),
            2 => 
            array (
                'id' => 'dd5e4618-deb5-42f3-bc48-724915340488',
                'konsumen_id' => NULL,
                'nominal_belanja' => 6000,
                'nominal_dibayar' => 10000,
                'nominal_kembalian' => 4000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:39:54',
                'updated_at' => '2025-06-26 14:39:54',
            ),
            3 => 
            array (
                'id' => 'ab4bbda6-6210-42fa-b186-0e74dc708489',
                'konsumen_id' => NULL,
                'nominal_belanja' => 6000,
                'nominal_dibayar' => 10000,
                'nominal_kembalian' => 4000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:41:37',
                'updated_at' => '2025-06-26 14:41:37',
            ),
            4 => 
            array (
                'id' => 'b4f28582-a6ef-454a-b65e-4b9b2cacda89',
                'konsumen_id' => '0d0443ca-b8dd-4520-be31-f301d32f0214',
                'nominal_belanja' => 6000,
                'nominal_dibayar' => 1000,
                'nominal_kembalian' => 0,
                'is_kasbon' => 1,
                'nominal_kasbon' => 5000,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:42:23',
                'updated_at' => '2025-06-26 14:42:23',
            ),
            5 => 
            array (
                'id' => '5801325c-9b1b-4687-a66d-fef28a1da3bc',
                'konsumen_id' => NULL,
                'nominal_belanja' => 6000,
                'nominal_dibayar' => 10000,
                'nominal_kembalian' => 4000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 14:42:51',
                'updated_at' => '2025-06-26 14:42:51',
            ),
            6 => 
            array (
                'id' => '62fdaa9c-0515-46b5-8496-36dddbb3ca5c',
                'konsumen_id' => 'a783f395-4ecb-44a9-b0f0-a015c6d6b357',
                'nominal_belanja' => 6000,
                'nominal_dibayar' => 1000,
                'nominal_kembalian' => 0,
                'is_kasbon' => 1,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 19:00:51',
                'updated_at' => '2025-06-28 13:59:21',
            ),
            7 => 
            array (
                'id' => '250b5187-e996-4eeb-a0e0-fadd54ad33a2',
                'konsumen_id' => NULL,
                'nominal_belanja' => 6000,
                'nominal_dibayar' => 10000,
                'nominal_kembalian' => 4000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-27 15:06:05',
                'updated_at' => '2025-06-27 15:06:05',
            ),
            8 => 
            array (
                'id' => '1f9fae61-ea2e-410c-ad0f-4c587dbb6d79',
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
                'created_at' => '2025-06-27 17:21:43',
                'updated_at' => '2025-06-27 17:21:43',
            ),
            9 => 
            array (
                'id' => '0a2be495-1ef3-4348-9e4f-e3cecebf0dc7',
                'konsumen_id' => NULL,
                'nominal_belanja' => 40000,
                'nominal_dibayar' => 50000,
                'nominal_kembalian' => 10000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-27 18:09:23',
                'updated_at' => '2025-06-27 18:09:23',
            ),
            10 => 
            array (
                'id' => '8fe51e47-8aa5-4194-8663-fe120c9449e1',
                'konsumen_id' => NULL,
                'nominal_belanja' => 6000,
                'nominal_dibayar' => 10000,
                'nominal_kembalian' => 4000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 09:14:50',
                'updated_at' => '2025-06-28 09:14:50',
            ),
            11 => 
            array (
                'id' => '71decf24-02a5-40a6-aa3e-b7c8d7131de0',
                'konsumen_id' => NULL,
                'nominal_belanja' => 40000,
                'nominal_dibayar' => 40000,
                'nominal_kembalian' => 0,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 09:15:11',
                'updated_at' => '2025-06-28 09:15:11',
            ),
        ));
        
        
    }
}