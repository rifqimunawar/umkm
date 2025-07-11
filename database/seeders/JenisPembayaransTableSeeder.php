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
                'id' => '700c3307-d034-4a39-8674-d294319d7aeb',
                'jenis_pembayaran' => 'Cash',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 11:05:09',
                'updated_at' => '2025-06-29 11:05:09',
            ),
        ));
        
        
    }
}