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
                'id' => 'a783f395-4ecb-44a9-b0f0-a015c6d6b357',
                'nama_konsumen' => 'Udin Petot',
                'kontak_konsumen' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-24 21:30:06',
                'updated_at' => '2025-06-24 21:30:06',
            ),
            1 => 
            array (
                'id' => '120bce38-18ac-4f47-97f6-b074405e70fb',
                'nama_konsumen' => 'Mahalini',
                'kontak_konsumen' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-24 21:31:16',
                'updated_at' => '2025-06-24 21:31:16',
            ),
            2 => 
            array (
                'id' => '078d735b-ef7c-479f-8542-d4ffaa3a6756',
                'nama_konsumen' => 'Komarudin',
                'kontak_konsumen' => 90,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-24 22:01:00',
                'updated_at' => '2025-06-24 22:01:00',
            ),
        ));
        
        
    }
}