<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey ="kd_barang";
    protected $fillable = [
        'kd_barang','nama_barang','kd_merek','kd_distributor','tanggal_masuk','harga_barang','stok_barang','keterangan'
    ];

}
