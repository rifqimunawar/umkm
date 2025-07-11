<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AssetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('assets')->delete();
        
        \DB::table('assets')->insert(array (
            0 => 
            array (
                'id' => '7c97254e-f610-4a45-b51a-91e909762fb5',
                'nama_asset' => 'Mesin Kopi',
                'kode' => NULL,
                'harga_beli_satuan' => 50000,
                'qty' => 4,
                'total_harga_beli' => 200000,
                'harga_jual' => NULL,
                'harga_jual_satuan' => NULL,
                'total_dibayar' => 200000,
                'is_hutang' => NULL,
                'total_hutang' => 0,
                'img' => NULL,
                'desc' => NULL,
                'supplier_id' => 'b9f683be-70b0-4a22-92f8-60dd476846ef',
                'satuan_id' => '56a2b538-6d62-40fe-9483-5ff0217f795e',
                'jatuh_tempo' => NULL,
                'status_lunas' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:49:23',
                'updated_at' => '2025-07-02 23:49:23',
            ),
        ));
        
        
    }
}