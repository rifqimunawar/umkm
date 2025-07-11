<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KonsumensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('konsumens')->delete();
        
        \DB::table('konsumens')->insert(array (
            0 => 
            array (
                'id' => 'ec36dcc4-bccc-45dd-b7db-2647dba4e91e',
                'nama_konsumen' => 'PRABOWO',
                'kontak_konsumen' => '077554376U',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:11:14',
                'updated_at' => '2025-07-03 00:11:14',
            ),
            1 => 
            array (
                'id' => '2dad193e-96eb-485c-b7ee-6bede853e7ee',
                'nama_konsumen' => 'imin',
                'kontak_konsumen' => NULL,
                'created_by' => 'udin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:48:43',
                'updated_at' => '2025-07-03 00:48:43',
            ),
        ));
        
        
    }
}