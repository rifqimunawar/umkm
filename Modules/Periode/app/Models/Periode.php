<?php

namespace Modules\Periode\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

// use Modules\Periode\Database\Factories\PeriodeFactory;

class Periode extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];
}
