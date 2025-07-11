<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KriteriasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kriterias')->delete();
        
        \DB::table('kriterias')->insert(array (
            0 => 
            array (
                'id' => 1,
                'jabatan_id' => '2',
                'kriteria' => 'Kepemimpinan',
                'desc' => 'skill kepemimpinan dalam menghandle project',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 17:16:47',
                'updated_at' => '2025-06-09 17:16:47',
            ),
            1 => 
            array (
                'id' => 2,
                'jabatan_id' => '2',
                'kriteria' => 'Komunikasi',
                'desc' => 'skill komunikasi yang baik terhadap team yang dibawa nya',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-09 17:17:10',
                'updated_at' => '2025-06-09 17:17:10',
            ),
        ));
        
        
    }
}