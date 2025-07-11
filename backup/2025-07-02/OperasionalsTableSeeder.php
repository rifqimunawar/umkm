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
                'id' => '3ff60de5-6688-41fd-a27a-0b784327e056',
                'nama_operasional' => 'Beli Bensin',
                'nominal_operasional' => 10000,
                'jenis_pembayaran_id' => '700c3307-d034-4a39-8674-d294319d7aeb',
                'desc' => 'membeli bensin untuk menjemput produk belanjaan',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 17:18:23',
                'updated_at' => '2025-06-29 17:18:41',
            ),
        ));
        
        
    }
}