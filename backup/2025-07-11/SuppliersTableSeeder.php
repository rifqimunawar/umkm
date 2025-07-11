<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('suppliers')->delete();
        
        \DB::table('suppliers')->insert(array (
            0 => 
            array (
                'id' => 'b9f683be-70b0-4a22-92f8-60dd476846ef',
                'nama_supplier' => 'PT Sumber Rejeki',
                'alamat_supplier' => 'Bandung Timur',
                'telp_supplier' => '08555555',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:43:37',
                'updated_at' => '2025-07-02 23:43:37',
            ),
            1 => 
            array (
                'id' => '816de16d-a8c5-4381-baea-f6661aded260',
                'nama_supplier' => 'CV Sejahtera Bersama',
                'alamat_supplier' => 'Soreang',
                'telp_supplier' => '08666666',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:51:08',
                'updated_at' => '2025-07-02 23:51:08',
            ),
        ));
        
        
    }
}