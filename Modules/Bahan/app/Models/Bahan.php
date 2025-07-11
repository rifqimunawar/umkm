<?php

namespace Modules\Bahan\Models;

use Illuminate\Support\Str;
use Modules\Master\Models\Satuan;
use Modules\Penjualan\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Master\Models\Supplier;

// use Modules\Bahan\Database\Factories\BahanFactory;

class Bahan extends Model
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

  public function produks()
  {
    return $this->belongsToMany(Produk::class, 'bahan_produk', 'bahan_id', 'produk_id')
      ->withPivot('jumlah_bahan_digunakan')
      ->withTimestamps();
  }

  public function satuan()
  {
    return $this->belongsTo(Satuan::class, 'satuan_id');
  }
  public function supplier()
  {
    return $this->belongsTo(Supplier::class, 'supplier_id');
  }

}
