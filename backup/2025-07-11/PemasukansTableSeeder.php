<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PemasukansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pemasukans')->delete();
        
        \DB::table('pemasukans')->insert(array (
            0 => 
            array (
                'id' => 'c5fccc28-a6c1-411e-8c4b-470f1e01f9b1',
                'nama_pemasukan' => 'Modal Awal',
                'sumber' => 'Baznas',
                'nominal_pemasukan' => 1000000,
                'jenis_pembayaran_id' => '700c3307-d034-4a39-8674-d294319d7aeb',
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:47:33',
                'updated_at' => '2025-07-02 23:47:33',
            ),
        ));
        
        
    }
}