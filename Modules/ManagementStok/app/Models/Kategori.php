<?php

namespace Modules\ManagementStok\Models;

use Illuminate\Support\Str;
use Modules\Penjualan\Models\Produk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\ManagementStok\Database\Factories\KategoriFactory;

class Kategori extends Model
{
  use HasFactory, SoftDeletes;
  protected $guarded = [];
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
    return $this->hasMany(Produk::class);
  }
}
