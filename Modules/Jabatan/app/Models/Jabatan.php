<?php

namespace Modules\Jabatan\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Karyawan\Models\Karyawan;

// use Modules\Jabatan\Database\Factories\JabatanFactory;

class Jabatan extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  public function karyawan()
  {
    return $this->hasMany(Karyawan::class, 'jabatan_id');
  }
}
