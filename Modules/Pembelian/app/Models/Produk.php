<?php

namespace Modules\Penjualan\Models;

use Illuminate\Support\Str;
use Laravel\Scout\Searchable;
use Modules\Bahan\Models\Bahan;
use Illuminate\Database\Eloquent\Model;
use Modules\ManagementStok\Models\Kategori;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Master\Models\Satuan;

// use Modules\ManagementStok\Database\Factories\ProdukFactory;

class Produk extends Model
{
  use HasFactory, SoftDeletes, Searchable;
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
  public function kategori()
  {
    return $this->belongsTo(Kategori::class, 'kategori_id');
  }
  public function satuan()
  {
    return $this->belongsTo(Satuan::class, 'satuan_id');
  }

  public function bahans()
  {
    return $this->belongsToMany(Bahan::class, 'bahan_produk', 'produk_id', 'bahan_id')
      ->withPivot('jumlah_bahan_digunakan')
      ->withTimestamps();
  }

}
