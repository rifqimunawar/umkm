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
                'nama' => 'Maya Indriyani',
                'nip' => '9090',
                'jabatan_id' => '1',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => 'admin',
                'deleted_at' => '2025-06-10 12:19:14',
                'created_at' => '2025-06-10 11:51:12',
                'updated_at' => '2025-06-10 12:19:14',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Rifqi Munawar Ridwan',
                'nip' => '123',
                'jabatan_id' => '1',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:19:26',
                'updated_at' => '2025-06-10 12:19:26',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Maya Indriyani',
                'nip' => '123',
                'jabatan_id' => '2',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:19:38',
                'updated_at' => '2025-06-10 12:19:38',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'Vina Aprilia',
                'nip' => '123',
                'jabatan_id' => '3',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:19:52',
                'updated_at' => '2025-06-10 12:19:52',
            ),
            4 => 
            array (
                'id' => 5,
                'nama' => 'Ridho Alamsyah',
                'nip' => '123',
                'jabatan_id' => '4',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:20:04',
                'updated_at' => '2025-06-10 12:20:04',
            ),
            5 => 
            array (
                'id' => 6,
                'nama' => 'Rendi Prasetyo',
                'nip' => '123',
                'jabatan_id' => '5',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:20:27',
                'updated_at' => '2025-06-10 12:20:27',
            ),
            6 => 
            array (
                'id' => 7,
                'nama' => 'as\'ad sayuti',
                'nip' => '123',
                'jabatan_id' => '6',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:20:51',
                'updated_at' => '2025-06-10 12:20:51',
            ),
            7 => 
            array (
                'id' => 8,
                'nama' => 'Alexandra Putra',
                'nip' => '123',
                'jabatan_id' => '5',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-06-10 12:21:14',
                'updated_at' => '2025-06-10 12:21:14',
            ),
        ));
        
        
    }
}