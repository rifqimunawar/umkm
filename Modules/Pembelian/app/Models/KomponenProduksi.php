<?php

namespace Modules\Pembelian\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Master\Models\Komponen;

// use Modules\Pembelian\Database\Factories\KomponenProduksiFactory;

class KomponenProduksi extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];

  // uuid
  public $incrementing = false;
  protected $keyType = 'string';

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($model) {
      if (!$model->getKey()) {
        $model->{$model->getKeyName()} = (string) Str::uuid();
      }
    });
  }
  // uuid

  public function komponen()
  {
    return $this->belongsTo(Komponen::class, 'komponen_id');
  }
}
