<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_menu')->delete();
        
        \DB::table('role_menu')->insert(array (
            0 => 
            array (
                'id' => 7,
                'role_id' => 3,
                'menu_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 27,
                'role_id' => 2,
                'menu_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 28,
                'role_id' => 2,
                'menu_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 29,
                'role_id' => 2,
                'menu_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 31,
                'role_id' => 2,
                'menu_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 32,
                'role_id' => 2,
                'menu_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 91,
                'role_id' => 2,
                'menu_id' => 51,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 92,
                'role_id' => 2,
                'menu_id' => 52,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 93,
                'role_id' => 2,
                'menu_id' => 53,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 94,
                'role_id' => 2,
                'menu_id' => 54,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 95,
                'role_id' => 2,
                'menu_id' => 55,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 98,
                'role_id' => 2,
                'menu_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 102,
                'role_id' => 2,
                'menu_id' => 58,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 103,
                'role_id' => 2,
                'menu_id' => 56,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 104,
                'role_id' => 2,
                'menu_id' => 57,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}