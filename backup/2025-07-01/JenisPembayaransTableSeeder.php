<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisPembayaransTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jenis_pembayarans')->delete();
        
        \DB::table('jenis_pembayarans')->insert(array (
            0 => 
            array (
                'id' => '0ba721b0-8c6e-4816-bf69-0848d1e79b02',
                'jenis_pembayaran' => 'Cash update',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-29 11:04:58',
                'created_at' => '2025-06-29 11:04:45',
                'updated_at' => '2025-06-29 11:04:58',
            ),
            1 => 
            array (
                'id' => '700c3307-d034-4a39-8674-d294319d7aeb',
                'jenis_pembayaran' => 'Cash',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 11:05:09',
                'updated_at' => '2025-06-29 11:05:09',
            ),
            2 => 
            array (
                'id' => 'ef716b4b-5361-4a51-b579-d4d64488af22',
                'jenis_pembayaran' => 'Dana',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 11:05:18',
                'updated_at' => '2025-06-29 11:05:18',
            ),
            3 => 
            array (
                'id' => '9c0e2d9b-98ec-46be-bcea-bb50c2a2cd33',
                'jenis_pembayaran' => 'Transfer BRI',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 11:05:31',
                'updated_at' => '2025-06-29 11:05:31',
            ),
        ));
        
        
    }
}