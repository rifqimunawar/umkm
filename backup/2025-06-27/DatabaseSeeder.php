<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run() : void
  {
    $this->call(SettingsTableSeeder::class);
    $this->call(RolesTableSeeder::class);
    $this->call(MenusTableSeeder::class);
    $this->call(UsersTableSeeder::class);
    $this->call(RoleMenuTableSeeder::class);
      $this->call(PeriodesTableSeeder::class);
        $this->call(JabatansTableSeeder::class);
        $this->call(KriteriasTableSeeder::class);
        $this->call(KaryawansTableSeeder::class);
        $this->call(PenilaiansTableSeeder::class);
        $this->call(PenilaianDetailsTableSeeder::class);
        $this->call(KategorisTableSeeder::class);
        $this->call(ProduksTableSeeder::class);
        $this->call(BahansTableSeeder::class);
        $this->call(BahanProduksTableSeeder::class);
        $this->call(KonsumensTableSeeder::class);
        $this->call(TransaksisTableSeeder::class);
        $this->call(DetailTransaksisTableSeeder::class);
    }
}
