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
                'id' => '528377e4-e468-4b03-9ebe-5682cc2db30e',
                'komponen_id' => '89b2759a-acbc-4bf1-8823-575c2f00fc0e',
                'nominal_komponen' => '500',
                'produk_temp_id' => '21f4a692-8b07-435d-a440-9d15808ccc15',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:57:37',
                'updated_at' => '2025-07-02 23:57:37',
            ),
            1 => 
            array (
                'id' => '0306679d-d503-4c60-9cc0-bd0df02f120c',
                'komponen_id' => '89b2759a-acbc-4bf1-8823-575c2f00fc0e',
                'nominal_komponen' => '500',
                'produk_temp_id' => '52ebcf82-e611-49a3-989a-045f89ad30f8',
                'produk_id' => '52ebcf82-e611-49a3-989a-045f89ad30f8',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:06:26',
                'updated_at' => '2025-07-03 00:08:10',
            ),
            2 => 
            array (
                'id' => 'c4cc4ed8-b97a-45bd-ad55-f9756eac33d7',
                'komponen_id' => '89b2759a-acbc-4bf1-8823-575c2f00fc0e',
                'nominal_komponen' => '1000',
                'produk_temp_id' => 'a3d5444e-45b5-464f-adab-517bf6be1891',
                'produk_id' => 'a3d5444e-45b5-464f-adab-517bf6be1891',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:10:17',
                'updated_at' => '2025-07-11 14:11:21',
            ),
            3 => 
            array (
                'id' => '26ec895b-9c8c-4262-adf7-2da48a403a4f',
                'komponen_id' => '8bf6611a-7b03-42b8-adce-e384b633d2dc',
                'nominal_komponen' => '500',
                'produk_temp_id' => 'a3d5444e-45b5-464f-adab-517bf6be1891',
                'produk_id' => 'a3d5444e-45b5-464f-adab-517bf6be1891',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:10:43',
                'updated_at' => '2025-07-11 14:11:21',
            ),
            4 => 
            array (
                'id' => '84202964-fdc7-4755-a024-ae0d6a152fce',
                'komponen_id' => '89b2759a-acbc-4bf1-8823-575c2f00fc0e',
                'nominal_komponen' => '1000',
                'produk_temp_id' => 'c67e3630-f85e-441a-b53d-e49e6c06792f',
                'produk_id' => 'c67e3630-f85e-441a-b53d-e49e6c06792f',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:23:08',
                'updated_at' => '2025-07-11 14:24:08',
            ),
            5 => 
            array (
                'id' => 'dcd7cc8c-78b3-4360-ba7d-ffdd915e7f4b',
                'komponen_id' => '8bf6611a-7b03-42b8-adce-e384b633d2dc',
                'nominal_komponen' => '1000',
                'produk_temp_id' => 'c67e3630-f85e-441a-b53d-e49e6c06792f',
                'produk_id' => 'c67e3630-f85e-441a-b53d-e49e6c06792f',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:23:18',
                'updated_at' => '2025-07-11 14:24:08',
            ),
            6 => 
            array (
                'id' => '47877fdd-462b-4090-a8b3-2055a5a1ea59',
                'komponen_id' => '288fcca2-111d-4d57-bbd7-5cc2f0c355bc',
                'nominal_komponen' => '5000',
                'produk_temp_id' => 'c67e3630-f85e-441a-b53d-e49e6c06792f',
                'produk_id' => 'c67e3630-f85e-441a-b53d-e49e6c06792f',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:23:25',
                'updated_at' => '2025-07-11 14:24:08',
            ),
            7 => 
            array (
                'id' => '633d7812-60ce-4f75-a1c3-afb8d396ca83',
                'komponen_id' => '288fcca2-111d-4d57-bbd7-5cc2f0c355bc',
                'nominal_komponen' => '9000',
                'produk_temp_id' => '4c77d597-cd65-489a-b0ed-0f03c61eac9b',
                'produk_id' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:26:14',
                'updated_at' => '2025-07-11 14:26:14',
            ),
            8 => 
            array (
                'id' => '1479fd9c-68fa-4277-a43e-8504b3e65e64',
                'komponen_id' => '288fcca2-111d-4d57-bbd7-5cc2f0c355bc',
                'nominal_komponen' => '5000',
                'produk_temp_id' => '320833dc-19a9-44f6-872d-68458025cee4',
                'produk_id' => '320833dc-19a9-44f6-872d-68458025cee4',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:29:34',
                'updated_at' => '2025-07-11 14:29:49',
            ),
        ));
        
        
    }
}