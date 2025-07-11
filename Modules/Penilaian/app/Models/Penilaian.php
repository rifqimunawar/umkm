<?php

namespace Modules\Penilaian\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Penilaian\Database\Factories\PenilaianFactory;

class Penilaian extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function details()
  {
    return $this->hasMany(PenilaianDetail::class);
  }

  public static function getDataPenilaian()
  {
    return DB::table('penilaians as a')
      ->join('karyawans as b', 'a.karyawan_id', '=', 'b.id')
      ->join('periodes as c', 'a.periode_id', '=', 'c.id')
      ->select('a.*', 'b.nama', 'c.bulan', 'c.tahun')
      ->whereNull('a.deleted_at')
      ->get();

  }

}
