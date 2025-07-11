<?php

namespace Modules\Pembelian\Models;

use Illuminate\Support\Str;
use Modules\Master\Models\Satuan;
use Modules\Master\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pembelian\Database\Factories\AssetFactory;

class Asset extends Model
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

  public function supplier()
  {
    return $this->belongsTo(Supplier::class, 'supplier_id');
  }

  public function satuan()
  {
    return $this->belongsTo(Satuan::class, 'satuan_id');
  }
}
