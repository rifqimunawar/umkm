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
            3 => 
            array (
                'id' => 'f90980fc-6d8c-41ee-bf51-11618fb83ca8',
                'nama_konsumen' => 'UCOK',
                'kontak_konsumen' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 11:10:59',
                'updated_at' => '2025-06-25 11:10:59',
            ),
            4 => 
            array (
                'id' => '0d0443ca-b8dd-4520-be31-f301d32f0214',
                'nama_konsumen' => 'aaa',
                'kontak_konsumen' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-25 18:04:04',
                'updated_at' => '2025-06-25 18:04:04',
            ),
            5 => 
            array (
                'id' => '4e4f68b8-c9de-4d8b-9531-273f1b705547',
                'nama_konsumen' => 'jokowi',
                'kontak_konsumen' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 10:33:03',
                'updated_at' => '2025-06-26 10:33:03',
            ),
        ));
        
        
    }
}