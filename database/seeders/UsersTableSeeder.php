<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'OWNER',
                'google_id' => NULL,
                'google_token' => NULL,
                'google_refresh_token' => NULL,
                'username' => 'admin',
                'img' => 'profile_admin_1751479075.png',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$03MdGVNvxcw9WlnK2HE84u.lpIXNoa6NYnq4PLdlz34brz8V2.uae',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-07-03 00:57:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'reza',
                'google_id' => NULL,
                'google_token' => NULL,
                'google_refresh_token' => NULL,
                'username' => 'reza',
                'img' => 'profile.png',
                'email' => 'reza@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$d5kPG/TnO/lyWZYdX3QWPeUn57Z.05M2Kq.oo42FLCBWj.yGreZWG',
                'role_id' => 4,
                'remember_token' => NULL,
                'created_at' => '2025-07-03 00:25:22',
                'updated_at' => '2025-07-03 00:25:22',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'UDINNN',
                'google_id' => NULL,
                'google_token' => NULL,
                'google_refresh_token' => NULL,
                'username' => 'udin',
                'img' => 'profile_udin_1751479150.jpg',
                'email' => 'udin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$nv3hZLpBmdhZBk2JbhFFy.sKHZ/oOFBKYHox4OHtXYEG5FcLGwo8O',
                'role_id' => 5,
                'remember_token' => NULL,
                'created_at' => '2025-07-03 00:45:48',
                'updated_at' => '2025-07-03 00:59:10',
            ),
        ));
        
        
    }
}