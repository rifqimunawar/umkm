<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Backup extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'make:backup {type=all} {--current=1}  {--users=1}';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Backup database using iseed';

  /**
   * Execute the console command.
   */
  public function handle()
  {
    $tableNames = config('permission.table_names');
    $is_windows = strtolower(PHP_SHLIB_SUFFIX) === 'dll';

    $win_parse = function ($str) use ($is_windows) {
      return str_replace(['\\', '/'], ($is_windows ? '\\' : '/'), $str);
    };

    $root = dirname(__FILE__);
    $root = "$root/../../..";
    $arg_type = $this->argument('type');
    $opt_users = $this->option('users');
    // backup migrasi database sebelumnya
    if ($this->option('current') == 1) {
      // pindahkan folder dulu
      $folder_parent = $win_parse("$root/backup");
      $folder_backup = $win_parse("$folder_parent/" . date('Y-m-d'));

      if (!file_exists("$folder_parent"))
        echo shell_exec("mkdir $folder_parent");
      if (!file_exists($folder_backup))
        echo shell_exec("mkdir $folder_backup");
      $copy = $is_windows ? 'copy' : 'cp -R';
      shell_exec($win_parse("$copy $root/database/seeders/* $folder_backup"));

      echo 'Backup data sedang berjalan . . . . . .' . PHP_EOL;
    }

    $tables = [
      'settings' => [
        'settings',
      ],
      'menus' => [
        'menus',
      ],
      'roles' => [
        'roles',
      ],
      'role_menu' => [
        'role_menu',
      ],

      // lanjutan

      // 'periodes' => [
      //   'periodes',
      // ],
      // 'jabatans' => [
      //   'jabatans',
      // ],
      // 'kriterias' => [
      //   'kriterias',
      // ],
      // 'karyawans' => [
      //   'karyawans',
      // ],
      // 'penilaians' => [
      //   'penilaians',
      // ],
      // 'penilaian_details' => [
      //   'penilaian_details',
      // ],
      'kategoris' => [
        'kategoris',
      ],
      'produks' => [
        'produks',
      ],
      'bahans' => [
        'bahans',
      ],
      'bahan_produks' => [
        'bahan_produks',
      ],
      'konsumens' => [
        'konsumens',
      ],
      'transaksis' => [
        'transaksis',
      ],
      'detail_transaksis' => [
        'detail_transaksis',
      ],
      'satuans' => [
        'satuans',
      ],
      'suppliers' => [
        'suppliers',
      ],
      'riwayat_pembayaran_piutangs' => [
        'riwayat_pembayaran_piutangs',
      ],
      'assets' => [
        'assets',
      ],
      'jenis_pembayarans' => [
        'jenis_pembayarans',
      ],
      'pemasukans' => [
        'pemasukans',
      ],
      'operasionals' => [
        'operasionals',
      ],
      'riwayat_pembayaran_hutangs' => [
        'riwayat_pembayaran_hutangs',
      ],
      'pengeluaran_lains' => [
        'pengeluaran_lains',
      ],
      'retur_pembelians' => [
        'retur_pembelians',
      ],
      'komponens' => [
        'komponens',
      ],
      'komponen_produksis' => [
        'komponen_produksis',
      ],
      'retur_penjualans' => [
        'retur_penjualans',
      ],
      'riwayat_pembelians' => [
        'riwayat_pembelians',
      ],

    ];
    if ($opt_users == 1 || $arg_type == 'users')
      echo shell_exec('php artisan iseed users --force');
    foreach ($tables as $k => $t) {
      $type = $arg_type == 'all' ? $tables[$k] : ($k == $arg_type ? $t : []);
      foreach ($type as $table) {
        echo shell_exec('php artisan iseed ' . $table . ' --force');
      }

      if (in_array($arg_type, $t)) {
        echo shell_exec('php artisan iseed ' . $arg_type . ' --force');
      }
    }
    return 1;
  }
}
