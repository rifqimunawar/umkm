<?php

namespace Modules\Kriteria\Models;

use Illuminate\Support\Facades\DB;
use Modules\Jabatan\Models\Jabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Modules\Kriteria\Database\Factories\KriteriaFactory;

class Kriteria extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function jabatan()
  {
    return $this->belongsTo(Jabatan::class, 'jabatan_id');
  }

  public static function byKaryawanId($id)
  {
    return DB::table('karyawans as a')
      ->select('a.id as karyawan_id', 'a.nama', 'a.jabatan_id', 'b.jabatan', 'c.id as kriteria_id', 'c.kriteria', 'c.desc')
      ->join('jabatans as b', 'a.jabatan_id', '=', 'b.id')
      ->join('kriterias as c', 'a.jabatan_id', '=', 'c.jabatan_id')
      ->where('a.id', $id)
      ->get();
  }
}
