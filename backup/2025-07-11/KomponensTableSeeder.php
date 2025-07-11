<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KomponensTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('komponens')->delete();
        
        \DB::table('komponens')->insert(array (
            0 => 
            array (
                'id' => '288fcca2-111d-4d57-bbd7-5cc2f0c355bc',
                'nama_komponen' => 'listrik',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:44:07',
                'updated_at' => '2025-07-02 23:44:07',
            ),
            1 => 
            array (
                'id' => '8bf6611a-7b03-42b8-adce-e384b633d2dc',
                'nama_komponen' => 'Air',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:44:20',
                'updated_at' => '2025-07-02 23:44:20',
            ),
            2 => 
            array (
                'id' => '89b2759a-acbc-4bf1-8823-575c2f00fc0e',
                'nama_komponen' => 'sewa ruko',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:44:33',
                'updated_at' => '2025-07-02 23:44:33',
            ),
        ));
        
        
    }
}