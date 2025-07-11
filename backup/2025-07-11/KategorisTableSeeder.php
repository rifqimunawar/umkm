<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategorisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kategoris')->delete();
        
        \DB::table('kategoris')->insert(array (
            0 => 
            array (
                'id' => '1',
                'nama_kategori' => 'Burger',
                'icon' => '<i class="fa-solid fa-burger"></i>',
                'desc' => 'berger',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-18 11:57:08',
                'created_at' => '2025-06-18 11:10:39',
                'updated_at' => '2025-06-18 11:57:08',
            ),
            1 => 
            array (
                'id' => '0fd0248b-453c-4aca-9075-ed5a273762e6',
                'nama_kategori' => 'KOPI',
                'icon' => '<i class="fa-solid fa-mug-hot"></i>',
                'desc' => 'drink',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-18 11:55:00',
                'updated_at' => '2025-06-19 21:39:59',
            ),
            2 => 
            array (
                'id' => '4de22f86-e8e7-43ca-97a6-e0e50d774920',
                'nama_kategori' => 'ROKOK',
                'icon' => '<i class="fa-solid fa-smoking"></i>',
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-18 13:15:49',
                'updated_at' => '2025-06-18 13:15:49',
            ),
            3 => 
            array (
                'id' => '61b64d03-e2a6-41c6-ac64-44456fd48818',
                'nama_kategori' => 'MAKANAN',
                'icon' => '<i class="fa-solid fa-utensils"></i>',
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-19 17:29:34',
                'updated_at' => '2025-06-19 17:29:34',
            ),
            4 => 
            array (
                'id' => 'ddb0acfb-c9e6-4d8d-a0b6-9701b4be17db',
                'nama_kategori' => 'KUE',
                'icon' => '<i class="fa-solid fa-cake-candles"></i>',
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:02:20',
                'updated_at' => '2025-07-03 00:02:20',
            ),
        ));
        
        
    }
}