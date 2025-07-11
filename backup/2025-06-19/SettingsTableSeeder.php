<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('settings')->delete();
        
        \DB::table('settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Forecasting UMKM',
                'alamat' => 'alamat',
                'email' => 'email@gmail.com',
                'phone' => '0888888888888',
                'base_url' => 'http://127.0.0.1:8000/',
                'logo' => 'logo_-1750217206.jpg',
                'background' => 'background_-1749529941.JPG',
                'favicon' => NULL,
                'description' => NULL,
                'social_facebook' => NULL,
                'social_twitter' => NULL,
                'social_instagram' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-06-18 10:26:46',
            ),
        ));
        
        
    }
}