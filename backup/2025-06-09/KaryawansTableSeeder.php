<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KaryawansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('karyawans')->delete();
        
        \DB::table('karyawans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Rifqi Munawar Ridwan',
                'nip' => '123',
                'jabatan_id' => '2',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 17:17:24',
                'updated_at' => '2025-06-09 17:17:24',
            ),
        ));
        
        
    }
}