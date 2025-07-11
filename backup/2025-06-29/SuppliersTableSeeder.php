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
                'id' => 'ff8f9022-e80a-4352-8fa7-4ccfece76c00',
                'nama_supplier' => 'PT Sumber Rejeki',
                'alamat_supplier' => 'Jl. Desa Cipadung No. 12 Desa Cipadung Kecamatan Cibiru Kota Bandung Jawa Barat Indonesia',
                'telp_supplier' => '628516145097',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 18:29:32',
                'updated_at' => '2025-06-26 18:31:09',
            ),
        ));
        
        
    }
}