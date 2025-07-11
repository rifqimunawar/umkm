<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SatuansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('satuans')->delete();
        
        \DB::table('satuans')->insert(array (
            0 => 
            array (
                'id' => '3e94e77f-d46a-4d39-bd9d-f4b5240a6c80',
                'nama_satuan' => 'Kg',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 18:16:36',
                'updated_at' => '2025-06-26 18:16:36',
            ),
            1 => 
            array (
                'id' => '5ab069a0-9ac5-492f-9bbf-57c27b6b849d',
                'nama_satuan' => 'Ons',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 18:16:48',
                'updated_at' => '2025-06-26 18:16:48',
            ),
            2 => 
            array (
                'id' => '01d573f0-12f1-4b47-a6d3-7c31203041d3',
                'nama_satuan' => 'Liter',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 18:16:57',
                'updated_at' => '2025-06-26 18:16:57',
            ),
            3 => 
            array (
                'id' => '7d17e42c-833a-4321-a456-f7ae88133363',
                'nama_satuan' => 'Buah',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 18:17:05',
                'updated_at' => '2025-06-26 18:17:05',
            ),
            4 => 
            array (
                'id' => 'db6f3359-225c-4cbc-be8e-b44cdb4fe391',
                'nama_satuan' => 'Pack',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 18:17:15',
                'updated_at' => '2025-06-26 18:17:15',
            ),
            5 => 
            array (
                'id' => 'b7ad11ce-43af-4cb2-a9a5-2b3962ff1c2e',
                'nama_satuan' => 'Kardus',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 18:17:32',
                'updated_at' => '2025-06-26 18:17:32',
            ),
            6 => 
            array (
                'id' => '3609040b-b0bc-4558-bf17-63e4ec4952df',
                'nama_satuan' => 'Gram',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-27 15:05:39',
                'updated_at' => '2025-06-27 15:05:39',
            ),
            7 => 
            array (
                'id' => 'c30a67ae-fa4e-4eda-8cbf-37201f918651',
                'nama_satuan' => 'Gelas',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 10:18:06',
                'updated_at' => '2025-06-28 10:18:06',
            ),
            8 => 
            array (
                'id' => 'e599453e-2a3c-4d75-974c-7e75f58d77d3',
                'nama_satuan' => 'Sachet',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 10:19:16',
                'updated_at' => '2025-06-28 10:19:16',
            ),
            9 => 
            array (
                'id' => '56a2b538-6d62-40fe-9483-5ff0217f795e',
                'nama_satuan' => 'Unit',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-28 10:19:25',
                'updated_at' => '2025-06-28 10:19:25',
            ),
        ));
        
        
    }
}