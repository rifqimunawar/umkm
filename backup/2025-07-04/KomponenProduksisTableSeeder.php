<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomponenProduksisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('komponen_produksis')->delete();
        
        \DB::table('komponen_produksis')->insert(array (
            0 => 
            array (
                'id' => '137d978e-2c62-4c67-b4b9-b928e419fd77',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '50000',
                'produk_temp_id' => '11434056-43a8-4d99-aa46-ce32f55f6036',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:11:35',
                'updated_at' => '2025-07-01 12:11:35',
            ),
            1 => 
            array (
                'id' => '7d171b1b-3a54-4d16-aaaf-256ad4e49bad',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '10000',
                'produk_temp_id' => '5731aaab-4004-414d-91c2-c9f040f7facb',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:17:36',
                'updated_at' => '2025-07-01 12:17:36',
            ),
            2 => 
            array (
                'id' => 'd07a4c61-e495-433e-8b4a-c7e3ef91dc9a',
                'komponen_id' => 'beb13be2-12e9-49e8-a7d0-d6631482dd04',
                'nominal_komponen' => '10000',
                'produk_temp_id' => 'a3216f3a-09d7-4c85-864c-3dbac97152a4',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:21:21',
                'updated_at' => '2025-07-01 12:21:21',
            ),
            3 => 
            array (
                'id' => '248f4147-c543-4341-83bf-29bdf1344a23',
                'komponen_id' => 'b7191f76-b2a8-419d-87df-710d52968bd1',
                'nominal_komponen' => '10000',
                'produk_temp_id' => '7a316bd8-5d8d-45f0-aede-2ac7bbc8dbeb',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:24:47',
                'updated_at' => '2025-07-01 12:24:47',
            ),
            4 => 
            array (
                'id' => '4721a08d-f1be-455e-a253-0aad58e6e982',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '10000',
                'produk_temp_id' => '7a316bd8-5d8d-45f0-aede-2ac7bbc8dbeb',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:25:48',
                'updated_at' => '2025-07-01 12:25:48',
            ),
            5 => 
            array (
                'id' => 'd36b8979-5aa3-474f-9a75-6d90853c843f',
                'komponen_id' => 'beb13be2-12e9-49e8-a7d0-d6631482dd04',
                'nominal_komponen' => '10000',
                'produk_temp_id' => 'be8044fd-1fff-41e2-b170-3dd94a8af48f',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:27:39',
                'updated_at' => '2025-07-01 12:27:39',
            ),
            6 => 
            array (
                'id' => '7f70f018-1add-43ef-8247-3636413a8791',
                'komponen_id' => 'beb13be2-12e9-49e8-a7d0-d6631482dd04',
                'nominal_komponen' => '50000',
                'produk_temp_id' => 'dca34318-cce2-488b-be0c-afa62e415d44',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:29:11',
                'updated_at' => '2025-07-01 12:29:11',
            ),
            7 => 
            array (
                'id' => '56a4e6a8-3220-464e-85b7-7ba6f5bbc786',
                'komponen_id' => 'b7191f76-b2a8-419d-87df-710d52968bd1',
                'nominal_komponen' => '20000',
                'produk_temp_id' => 'd1e9e76d-1353-4b87-ac02-2e92971d5781',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-07-01 12:31:37',
                'created_at' => '2025-07-01 12:31:21',
                'updated_at' => '2025-07-01 12:31:37',
            ),
            8 => 
            array (
                'id' => 'fde482a0-0770-445c-8a1f-6c7fc1befc38',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '10000',
                'produk_temp_id' => 'c6c3f992-8115-4afa-a8f5-9ae41e39293f',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:40:18',
                'updated_at' => '2025-07-01 12:40:18',
            ),
            9 => 
            array (
                'id' => 'aaf25e54-8962-4328-bcec-14b63eadb1e5',
                'komponen_id' => 'beb13be2-12e9-49e8-a7d0-d6631482dd04',
                'nominal_komponen' => '5000',
                'produk_temp_id' => '784fb492-f4ea-4b4f-b919-27a2c5489b6d',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:44:21',
                'updated_at' => '2025-07-01 12:44:21',
            ),
            10 => 
            array (
                'id' => '3ad4bfda-f904-4d23-8417-cbfb4fd12e8b',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '1000',
                'produk_temp_id' => '784fb492-f4ea-4b4f-b919-27a2c5489b6d',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:44:51',
                'updated_at' => '2025-07-01 12:44:51',
            ),
            11 => 
            array (
                'id' => '6313aa58-f0bc-4eb5-8790-c9e81571b7b2',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '1000',
                'produk_temp_id' => '784fb492-f4ea-4b4f-b919-27a2c5489b6d',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:45:00',
                'updated_at' => '2025-07-01 12:45:00',
            ),
            12 => 
            array (
                'id' => '085deabf-bc57-49d5-872f-e9d371d48018',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '1000',
                'produk_temp_id' => '784fb492-f4ea-4b4f-b919-27a2c5489b6d',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:45:06',
                'updated_at' => '2025-07-01 12:45:06',
            ),
            13 => 
            array (
                'id' => 'f2bd6997-fa42-4e66-9d4c-c77f2d0ed7da',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '1000',
                'produk_temp_id' => '784fb492-f4ea-4b4f-b919-27a2c5489b6d',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:45:07',
                'updated_at' => '2025-07-01 12:45:07',
            ),
            14 => 
            array (
                'id' => 'db7a0f46-a01d-4752-9ab3-a73f00fc5c70',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '1000',
                'produk_temp_id' => '784fb492-f4ea-4b4f-b919-27a2c5489b6d',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:45:08',
                'updated_at' => '2025-07-01 12:45:08',
            ),
            15 => 
            array (
                'id' => '08358dcd-ef6c-4801-b435-dfdb1f261c64',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '1000',
                'produk_temp_id' => '784fb492-f4ea-4b4f-b919-27a2c5489b6d',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:45:09',
                'updated_at' => '2025-07-01 12:45:09',
            ),
            16 => 
            array (
                'id' => '64fca12f-1364-493e-82bb-6d69abfe26af',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '1000',
                'produk_temp_id' => '784fb492-f4ea-4b4f-b919-27a2c5489b6d',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:45:10',
                'updated_at' => '2025-07-01 12:45:10',
            ),
            17 => 
            array (
                'id' => '7dce0133-d888-4f77-a54d-e3756c40ee22',
                'komponen_id' => 'beb13be2-12e9-49e8-a7d0-d6631482dd04',
                'nominal_komponen' => '5000',
                'produk_temp_id' => '2a00e482-3f8d-40c0-b207-693f25889018',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:48:52',
                'updated_at' => '2025-07-01 12:48:52',
            ),
            18 => 
            array (
                'id' => '35a877fd-b19f-4acc-bc09-62e7b1e77d3d',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '4000',
                'produk_temp_id' => 'b191c6b7-6fda-4858-9943-b498085e1925',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:50:23',
                'updated_at' => '2025-07-01 12:50:23',
            ),
            19 => 
            array (
                'id' => 'f9252987-5075-4a14-858b-94ec5c0af257',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '1000',
                'produk_temp_id' => 'fd095fd5-e131-445c-b844-1e8973cb3765',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:52:37',
                'updated_at' => '2025-07-01 12:52:37',
            ),
            20 => 
            array (
                'id' => '325c33ba-6810-4f7b-ad57-d94480f53d80',
                'komponen_id' => 'beb13be2-12e9-49e8-a7d0-d6631482dd04',
                'nominal_komponen' => '1000',
                'produk_temp_id' => '037b8707-2454-4d0f-b75b-053b5accc49c',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 12:55:44',
                'updated_at' => '2025-07-01 12:55:44',
            ),
            21 => 
            array (
                'id' => '8c076df6-6218-4a6d-8698-ece3f91c5a06',
                'komponen_id' => 'beb13be2-12e9-49e8-a7d0-d6631482dd04',
                'nominal_komponen' => '5000',
                'produk_temp_id' => '4c0e403c-483f-4fd4-ad82-09008eb77036',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 13:02:21',
                'updated_at' => '2025-07-01 13:02:21',
            ),
            22 => 
            array (
                'id' => '27390e76-1b11-4b0a-b8d0-a105fc20c495',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '1000',
                'produk_temp_id' => '4c0e403c-483f-4fd4-ad82-09008eb77036',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 13:02:33',
                'updated_at' => '2025-07-01 13:02:33',
            ),
            23 => 
            array (
                'id' => 'b5ca5bb0-3119-4d63-8a2b-0d040694ac5c',
                'komponen_id' => 'b7191f76-b2a8-419d-87df-710d52968bd1',
                'nominal_komponen' => '3000',
                'produk_temp_id' => '7fa84fd6-1bb3-41e7-90ad-90497b91429b',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 20:39:04',
                'updated_at' => '2025-07-01 20:39:04',
            ),
            24 => 
            array (
                'id' => '75967cbf-748d-452f-8b5d-63acfc5e1a95',
                'komponen_id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nominal_komponen' => '10000',
                'produk_temp_id' => '8ed82410-d692-496e-b5f1-db254247fb02',
                'produk_id' => '8ed82410-d692-496e-b5f1-db254247fb02',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 20:47:50',
                'updated_at' => '2025-07-01 20:48:23',
            ),
        ));
        
        
    }
}