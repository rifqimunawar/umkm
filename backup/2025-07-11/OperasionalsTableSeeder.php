<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OperasionalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('operasionals')->delete();
        
        \DB::table('operasionals')->insert(array (
            0 => 
            array (
                'id' => '6f67fdcf-2f3b-4ad5-b20b-309f8ca7e9e6',
                'nama_operasional' => 'Beli Bensin',
                'nominal_operasional' => 10000,
                'jenis_pembayaran_id' => '700c3307-d034-4a39-8674-d294319d7aeb',
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-04 21:37:57',
                'updated_at' => '2025-07-04 21:37:57',
            ),
            1 => 
            array (
                'id' => '2d5b0c8d-de24-43bc-87b5-dabe157033f0',
                'nama_operasional' => 'konsumsi',
                'nominal_operasional' => 50000,
                'jenis_pembayaran_id' => '700c3307-d034-4a39-8674-d294319d7aeb',
                'desc' => 'nasi padang untuk konsumsi hari ini',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 13:05:07',
                'updated_at' => '2025-07-11 13:05:07',
            ),
        ));
        
        
    }
}