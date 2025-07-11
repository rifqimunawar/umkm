<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransaksisTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('transaksis')->delete();
        
        \DB::table('transaksis')->insert(array (
            0 => 
            array (
                'id' => '224475ae-aef9-46f9-9c54-b6f9db27604f',
                'konsumen_id' => NULL,
                'nominal_belanja' => 6000,
                'nominal_dibayar' => 10000,
                'nominal_kembalian' => 4000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 11:53:32',
                'updated_at' => '2025-06-26 11:53:32',
            ),
            1 => 
            array (
                'id' => 'b366da54-8f22-4c21-a65c-a70153a2b874',
                'konsumen_id' => NULL,
                'nominal_belanja' => 6000,
                'nominal_dibayar' => 10000,
                'nominal_kembalian' => 4000,
                'is_kasbon' => 0,
                'nominal_kasbon' => 0,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-26 11:54:58',
                'updated_at' => '2025-06-26 11:54:58',
            ),
        ));
        
        
    }
}