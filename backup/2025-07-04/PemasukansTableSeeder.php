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
                'id' => 'a26942ec-2c8e-4d1b-a42e-1d805707bf77',
                'nama_pemasukan' => 'Dana Hibah',
                'sumber' => 'Pemerintah Daerah',
                'nominal_pemasukan' => 6000000,
                'jenis_pembayaran_id' => '9c0e2d9b-98ec-46be-bcea-bb50c2a2cd33',
                'desc' => 'tambahan modal dari mas wapres',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 16:03:53',
                'updated_at' => '2025-06-29 16:03:53',
            ),
        ));
        
        
    }
}