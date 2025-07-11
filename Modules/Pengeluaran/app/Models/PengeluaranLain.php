<?php

namespace Modules\Pengeluaran\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Modules\Master\Models\JenisPembayaran;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pengeluaran\Database\Factories\PengeluaranLainFactory;

class PengeluaranLain extends Model
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

  public function jenisPembayaran()
  {
    return $this->belongsTo(JenisPembayaran::class, 'jenis_pembayaran_id');
  }
}
