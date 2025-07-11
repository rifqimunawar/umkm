<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PengeluaranLainsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pengeluaran_lains')->delete();
        
        \DB::table('pengeluaran_lains')->insert(array (
            0 => 
            array (
                'id' => '963e37c0-2947-41d9-9f5c-ac26909ac7aa',
                'nama_pengeluaran_lain' => 'pengemis',
                'nominal_pengeluaran_lain' => 2000,
                'jenis_pembayaran_id' => '700c3307-d034-4a39-8674-d294319d7aeb',
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 17:40:31',
                'updated_at' => '2025-06-29 17:40:31',
            ),
            1 => 
            array (
                'id' => '55adcd3d-6a07-4eed-8e7e-85165ce2fc9c',
                'nama_pengeluaran_lain' => 'pengemis',
                'nominal_pengeluaran_lain' => 2000,
                'jenis_pembayaran_id' => '700c3307-d034-4a39-8674-d294319d7aeb',
                'desc' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-29 17:42:18',
                'updated_at' => '2025-06-29 17:42:18',
            ),
        ));
        
        
    }
}