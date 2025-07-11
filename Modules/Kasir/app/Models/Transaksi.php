<?php

namespace Modules\Kasir\Models;

use Illuminate\Support\Str;
use Modules\Konsumen\Models\Konsumen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Kasir\Database\Factories\TransaksiFactory;

class Transaksi extends Model
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

  public function konsumen()
  {
    return $this->belongsTo(Konsumen::class, 'konsumen_id');
  }
  public function detailTransaksi()
  {
    return $this->hasMany(DetailTransaksi::class);
  }

  public static function generateNoTransaksi()
  {
    $last = self::orderBy('no_transaksi', 'desc')->value('no_transaksi');
    $nextNumber = $last ? (int) $last + 1 : 1;
    $formatted = str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
    return $formatted;
  }
}
