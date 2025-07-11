<?php

namespace Modules\Karyawan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Jabatan\Models\Jabatan;

// use Modules\Karyawan\Database\Factories\KaryawanFactory;

class Karyawan extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function jabatan()
  {
    return $this->belongsTo(Jabatan::class, 'jabatan_id');
  }
}
