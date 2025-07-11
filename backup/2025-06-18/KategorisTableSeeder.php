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
                'nama_kategori' => 'Minuman',
                'icon' => '<i class="fa-solid fa-mug-hot"></i>',
                'desc' => 'drink',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-18 11:55:00',
                'updated_at' => '2025-06-18 11:55:00',
            ),
        ));
        
        
    }
}