<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BahanProduksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('bahan_produks')->delete();
        
        \DB::table('bahan_produks')->insert(array (
            0 => 
            array (
                'id' => 'b59b040e-7bb8-4abc-8871-d5f581031518',
                'produk_id' => NULL,
                'produk_temp_id' => '21f4a692-8b07-435d-a440-9d15808ccc15',
                'bahan_id' => 'ac3c21b0-9e16-4def-98f0-93a016318345',
                'jumlah_bahan_digunakan' => 1,
                'jumlah_bahan_digunakan_unk_1_produk' => NULL,
                'satuan' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-02 23:57:11',
                'updated_at' => '2025-07-02 23:57:11',
            ),
            1 => 
            array (
                'id' => 'eb82110d-1821-415d-936a-98d592f36bf5',
                'produk_id' => NULL,
                'produk_temp_id' => '4c77d597-cd65-489a-b0ed-0f03c61eac9b',
                'bahan_id' => '7cf61a66-6949-43be-9906-925ffc7a9d3f',
                'jumlah_bahan_digunakan' => 3,
                'jumlah_bahan_digunakan_unk_1_produk' => NULL,
                'satuan' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-07-11 14:26:04',
                'updated_at' => '2025-07-11 14:26:04',
            ),
        ));
        
        
    }
}