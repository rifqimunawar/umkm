<?php

namespace Modules\Penilaian\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Penilaian\Database\Factories\PenilaianDetailFactory;

class PenilaianDetail extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];
}
