<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomponensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('komponens')->delete();
        
        \DB::table('komponens')->insert(array (
            0 => 
            array (
                'id' => 'b7191f76-b2a8-419d-87df-710d52968bd1',
                'nama_komponen' => 'gas elpiji 3 kg',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 01:35:46',
                'updated_at' => '2025-07-01 01:35:46',
            ),
            1 => 
            array (
                'id' => 'beb13be2-12e9-49e8-a7d0-d6631482dd04',
                'nama_komponen' => 'listrik',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 01:35:54',
                'updated_at' => '2025-07-01 01:35:54',
            ),
            2 => 
            array (
                'id' => '2570efce-e004-454a-be0a-bbcfe87083b8',
                'nama_komponen' => 'sewa ruko',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-01 01:36:05',
                'updated_at' => '2025-07-01 01:36:05',
            ),
        ));
        
        
    }
}