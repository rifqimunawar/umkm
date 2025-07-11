<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 2,
                'role_name' => 'OWNER',
                'deleted_at' => NULL,
                'created_at' => '2024-12-13 22:03:33',
                'updated_at' => '2025-07-03 00:19:01',
            ),
            1 => 
            array (
                'id' => 3,
            'role_name' => 'HRD (Sumber Daya Manusia)',
                'deleted_at' => '2025-07-03 00:17:45',
                'created_at' => '2024-12-08 16:18:32',
                'updated_at' => '2025-07-03 00:17:45',
            ),
            2 => 
            array (
                'id' => 4,
                'role_name' => 'ADIMISTATOR',
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:18:29',
                'updated_at' => '2025-07-03 00:18:29',
            ),
            3 => 
            array (
                'id' => 5,
                'role_name' => 'KASIR',
                'deleted_at' => NULL,
                'created_at' => '2025-07-03 00:19:24',
                'updated_at' => '2025-07-03 00:19:24',
            ),
        ));
        
        
    }
}