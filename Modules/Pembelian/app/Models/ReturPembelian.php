<?php

namespace Modules\Pembelian\Models;

use Illuminate\Support\Str;
use Modules\Master\Models\Satuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Pembelian\Database\Factories\ReturPembelianFactory;

class ReturPembelian extends Model
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

  public static function dataPembelian()
  {
    $bahans = DB::table('bahans as a')
      ->select([
        DB::raw('a.id as id_barang'),
        DB::raw('a.nama_bahan as nama_barang'),
        DB::raw('a.harga_bahan as harga_satuan'),
        DB::raw('a.jumlah_bahan as quantity'),
        DB::raw('(a.harga_bahan * a.jumlah_bahan) as total_harga'),
        DB::raw('a.created_at as time')
      ])
      ->whereNull('a.deleted_at');
    $assets = DB::table('assets as b')
      ->select([
        DB::raw('b.id as id_barang'),
        DB::raw('b.nama_asset as nama_barang'),
        DB::raw('b.harga_beli_satuan as harga_satuan'),
        DB::raw('b.qty as quantity'),
        DB::raw('b.total_harga_beli as total_harga'),
        DB::raw('b.created_at as time')
      ])
      ->whereNull('b.deleted_at');
    $produks = DB::table('produks as c')
      ->select([
        DB::raw('c.id as id_barang'),
        DB::raw('c.nama_produk as nama_barang'),
        DB::raw('ROUND(c.harga_beli_satuan) as harga_satuan'),
        DB::raw('c.jumlah_produk as quantity'),
        DB::raw('c.harga_beli as total_harga'),
        DB::raw('c.created_at as time')
      ])
      ->whereNull('c.deleted_at')
      ->where('c.jumlah_produk', '>', 0);
    return $bahans
      ->unionAll($assets)
      ->unionAll($produks)
      ->orderBy('time', 'desc')
      ->get();
  }

  public static function getDataPembelianById($id_barang)
  {
    $bahans = DB::table('bahans as a')
      ->leftJoin('suppliers as d', 'a.supplier_id', '=', 'd.id')
      ->select([
        DB::raw('a.nama_bahan as nama_barang'),
        DB::raw('a.harga_bahan as harga_satuan'),
        DB::raw('a.jumlah_bahan as quantity'),
        DB::raw('(a.harga_bahan * a.jumlah_bahan) as total_harga'),
        DB::raw('a.created_at as time'),
        DB::raw('a.supplier_id as supplier_id'),
        DB::raw('a.satuan_id as satuan_id'),
        DB::raw('d.nama_supplier as nama_supplier'),
        DB::raw('a.id as id_barang'),
        DB::raw('1 as sumber'),
        DB::raw('"bahans" as sumber_text')
      ])
      ->whereNull('a.deleted_at');

    $assets = DB::table('assets as b')
      ->leftJoin('suppliers as d', 'b.supplier_id', '=', 'd.id')
      ->select([
        DB::raw('b.nama_asset as nama_barang'),
        DB::raw('b.harga_beli_satuan as harga_satuan'),
        DB::raw('b.qty as quantity'),
        DB::raw('b.total_harga_beli as total_harga'),
        DB::raw('b.created_at as time'),
        DB::raw('b.supplier_id as supplier_id'),
        DB::raw('b.satuan_id as satuan_id'),
        DB::raw('d.nama_supplier as nama_supplier'),
        DB::raw('b.id as id_barang'),
        DB::raw('2 as sumber'),
        DB::raw('"assets" as sumber_text')
      ])
      ->whereNull('b.deleted_at');

    $produks = DB::table('produks as c')
      ->leftJoin('suppliers as d', 'c.supplier_id', '=', 'd.id')
      ->select([
        DB::raw('c.nama_produk as nama_barang'),
        DB::raw('ROUND(c.harga_beli_satuan) as harga_satuan'),
        DB::raw('c.jumlah_produk as quantity'),
        DB::raw('c.harga_beli as total_harga'),
        DB::raw('c.created_at as time'),
        DB::raw('c.supplier_id as supplier_id'),
        DB::raw('c.satuan_id as satuan_id'),
        DB::raw('d.nama_supplier as nama_supplier'),
        DB::raw('c.id as id_barang'),
        DB::raw('3 as sumber'),
        DB::raw('"produks" as sumber_text')
      ])
      ->whereNull('c.deleted_at')
      ->where('c.jumlah_produk', '>', 0);

    $unionQuery = $bahans
      ->unionAll($assets)
      ->unionAll($produks);

    $result = DB::query()
      ->fromSub($unionQuery, 'combined')
      ->where('id_barang', $id_barang)
      ->first();

    return $result;
  }


  public function satuan()
  {
    return $this->belongsTo(Satuan::class, 'satuan_id');
  }

}
